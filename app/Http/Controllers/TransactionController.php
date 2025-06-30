<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChooseRoomRequest;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Transaction;
use App\Services\ReservationService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->middleware(['auth', 'admin']);
        $this->reservationService = $reservationService;
    }

    public function index()
    {
        $transaction = Transaction::where('status', 'Reservation')->where('check_in', '>=', Carbon::now())->orderBy('check_in', 'asc')->get();
        return view('dashboard.order.index', compact('transaction'));
    }

    public function history()
    {
        $transaction = Transaction::where('status', '!=', 'Reservation')->orWhere('check_in', '<', Carbon::now())->orderBy('check_in', 'asc')->get();
        return view('dashboard.order.history', compact('transaction'));
    }

    public function chooseroom(ChooseRoomRequest $request)
    {
        $customer = Customer::findOrFail($request->c_id);

        // REFAKTOR: Menggunakan Query Scope 'availableFor'
        $rooms = Room::availableFor($request->from, $request->to)
            ->where('capacity', '>=', $request->count)
            ->with('type', 'status', 'images')
            ->get();

        return view('dashboard.order.chooseroom', [
            'customer' => $customer,
            'roomsCount' => $rooms->count(),
            'rooms' => $rooms,
            'stayfrom' => Carbon::parse($request->from)->isoFormat('D MMM Yvonne'),
            'stayto' => Carbon::parse($request->to)->isoFormat('D MMM Yvonne'),
            'request' => $request,
        ]);
    }

    public function confirmation(Request $request)
    {
        $room = Room::with('type')->findOrFail($request->room);
        $customer = Customer::findOrFail($request->customer);
        $stayfrom = Carbon::parse($request->from);
        $stayuntil = Carbon::parse($request->to);

        // REFAKTOR: Logika perhitungan harga dipindahkan ke model Transaction
        $transactionStub = new Transaction([
            'room_id' => $room->id,
            'check_in' => $stayfrom,
            'check_out' => $stayuntil,
        ]);
        $transactionStub->setRelation('room', $room);

        return view('dashboard.order.confirmation', [
            'dayDifference' => $transactionStub->getDateDifferenceWithPlural(),
            'customer' => $customer,
            'room' => $room,
            'stayfrom' => $stayfrom,
            'stayuntil' => $stayuntil,
            'total' => $transactionStub->total_price, // Menggunakan accessor
            'downPayment' => $transactionStub->minimum_down_payment // Menggunakan accessor
        ]);
    }

    public function payDownPayment(Request $request)
    {
        // REFAKTOR: Logika dipindahkan ke Service.
        return $this->reservationService->createFromAdmin($request);
    }
}
