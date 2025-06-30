<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Room;
use App\Models\Transaction;
use App\Services\ReservationService; // REFAKTOR
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    protected $reservationService;

    // REFAKTOR: Dependency injection untuk ReservationService
    public function __construct(ReservationService $reservationService)
    {
        $this->middleware('auth');
        $this->reservationService = $reservationService;
    }

    public function index(Request $request)
    {
        $stayFrom = Carbon::parse($request->from);
        $stayUntil = Carbon::parse($request->to);

        // REFAKTOR: Gunakan Query Scope 'availableFor'
        if (!Room::availableFor($stayFrom, $stayUntil)->where('id', $request->room)->exists()) {
            Alert::error('Kamar Tidak Tersedia', 'Maaf, kamar ini sudah dipesan pada rentang tanggal yang Anda pilih.');
            return back();
        }

        $room = Room::findOrFail($request->room);
        $customer = Auth::user()->customer;
        $dayDifference = $stayFrom->diffInDays($stayUntil);
        $totalPrice = $room->price * $dayDifference;
        $paymentMethods = PaymentMethod::where('id', '!=', 1)->get(); // Ambil metode pembayaran selain 'OFFLINE'

        return view('frontend.order', [
            'customer' => $customer,
            'room' => $room,
            'stayfrom' => $stayFrom,
            'stayuntil' => $stayUntil,
            'dayDifference' => $dayDifference,
            'total' => $totalPrice,
            'paymentmet' => $paymentMethods,
        ]);
    }

    public function order(Request $request)
    {
        // REFAKTOR: Controller hanya memanggil service.
        return $this->reservationService->createFromCustomer($request);
    }

    /**
     * REFAKTOR: Menampilkan halaman invoice.
     */
    public function invoice($id)
    {
        // Pastikan user hanya bisa lihat invoice miliknya
        $payment = Payment::with(['customer', 'transaction.room', 'methode'])
            ->where('id', $id)
            ->where('c_id', Auth::user()->customer->id)
            ->firstOrFail();

        // Jangan tampilkan invoice jika statusnya masih 'Pending'
        if ($payment->status == 'Pending') {
            return abort(404, 'Invoice Not Found');
        }

        return view('frontend.invoice', ['p' => $payment]);
    }

    /**
     * REFAKTOR: Menampilkan halaman untuk melakukan pembayaran.
     */
    public function pembayaran($transaction_id)
    {
        $transaction = Transaction::with('payments.methode', 'room')
            ->where('id', $transaction_id)
            ->where('c_id', Auth::user()->customer->id) // Pastikan user hanya bisa bayar transaksinya sendiri
            ->firstOrFail();

        // Cari pembayaran yang pending dan bukan offline
        $payment = $transaction->payments()
            ->where('status', 'Pending')
            ->where('payment_method_id', '!=', 1)
            ->first();

        // Jika tidak ada pembayaran pending atau sudah ada bukti upload, jangan tampilkan halaman ini.
        if (!$payment || !is_null($payment->image)) {
            Alert::info('Info', 'Tidak ada tagihan yang perlu dibayar atau Anda sudah mengupload bukti pembayaran.');
            return redirect('/history');
        }

        return view('frontend.bayar', [
            't' => $transaction,
            'price' => $transaction->total_price, // Gunakan accessor dari model
            'pay' => $payment
        ]);
    }

    /**
     * REFAKTOR: Menyimpan bukti pembayaran yang di-upload.
     */
    public function bayar(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:payments,id',
            'image' => 'required|image|file|max:2048', // Batasi ukuran file
        ]);

        $payment = Payment::findOrFail($validated['id']);

        // Pastikan user hanya bisa upload bukti untuk pembayarannya sendiri
        if ($payment->c_id !== Auth::user()->customer->id) {
            return abort(403, 'Unauthorized Action');
        }

        $imagePath = $request->file('image')->store('bukti-images', 'public');
        $payment->update(['image' => $imagePath]);

        Alert::success('Pembayaran Berhasil', 'Terima kasih! Mohon tunggu konfirmasi dari admin.');
        return redirect('/history');
    }
}
