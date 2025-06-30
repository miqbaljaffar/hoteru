<?php
// File baru: app/Services/ReservationService.php

namespace App\Services;

use App\Models\Room;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\User;
use App\Events\NewReservationEvent;
use App\Events\RefreshDashboardEvent;
use App\Notifications\NewRoomReservationDownPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReservationService
{
    /**
     * Membuat reservasi baru dari sisi pelanggan (frontend).
     */
    public function createFromCustomer(Request $request)
    {
        // Gunakan DB Transaction untuk memastikan integritas data.
        return DB::transaction(function () use ($request) {
            $room = Room::findOrFail($request->room);
            $customer = Customer::findOrFail($request->customer);

            if (!Room::availableFor($request->check_in, $request->check_out)->where('id', $room->id)->exists()) {
                Alert::error('Kamar Tidak Tersedia', 'Kamar ini sudah dipesan pada tanggal tersebut.');
                return redirect()->back();
            }

            if (is_null($customer->nik)) {
                Alert::error('Kesalahan Data', 'Mohon lengkapi data NIK Anda pada halaman profil.');
                return redirect('myaccount');
            }

            $transaction = Transaction::create([
                'room_id' => $room->id,
                'c_id' => $customer->id,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'status' => 'Reservation'
            ]);

            $payment = Payment::create([
                'c_id' => $customer->id,
                'transaction_id' => $transaction->id,
                'price' => $request->total_price, // total_price dari form
                'status' => 'Pending',
                'payment_method_id' => $request->payment_method_id,
                'invoice' => $this->generateInvoice($customer->id)
            ]);

            $this->notifyAdmins($transaction, $payment);

            Alert::success('Terima Kasih!', 'Kamar ' . $room->no . ' telah dipesan. Silakan lakukan pembayaran.');
            return redirect('/payment/' . $transaction->id);
        });
    }

    /**
     * Membuat reservasi dari sisi admin (dashboard).
     */
    public function createFromAdmin(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $transaction = Transaction::create([
                'room_id' => $request->room,
                'c_id' => $request->customer,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'status' => 'Reservation'
            ]);

            $payment = Payment::create([
                'c_id' => $request->customer,
                'transaction_id' => $transaction->id,
                'price' => $request->downPayment,
                'status' => 'Down Payment',
                'payment_method_id' => 1, // Offline/Cash
                'invoice' => $this->generateInvoice($request->customer)
            ]);

            $this->notifyAdmins($transaction, $payment);

            Alert::success('Success', 'Pemesanan berhasil dibuat.');
            return redirect()->route('dashboard.orders.index'); // Gunakan nama route
        });
    }

    /**
     * Generate kode invoice yang unik.
     */
    protected function generateInvoice(int $customerId): string
    {
        return 'INV/' . now()->format('Ymd') . '/' . $customerId . '/' . strtoupper(Str::random(5));
    }

    /**
     * Mengirim notifikasi ke semua admin.
     */
    protected function notifyAdmins(Transaction $transaction, Payment $payment)
    {
        $admins = User::where('is_admin', 1)->get();
        $customerName = $transaction->customer->name;

        foreach ($admins as $admin) {
            $message = 'Reservasi baru oleh ' . $customerName;
            event(new NewReservationEvent($message, $admin));
            $admin->notify(new NewRoomReservationDownPayment($transaction, $payment));
        }
        event(new RefreshDashboardEvent("Seseorang memesan kamar"));
    }
}
