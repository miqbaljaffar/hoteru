<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChooseRoomRequest;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function index(){
        $p = Carbon::now()->isoFormat('Y-M-D');
       $transaction = Transaction::where('check_out', '>=' , $p)->get();
        return view('dashboard.order.index', compact('transaction'));
    }

    public function history(){
        $p = Carbon::now();
        $transaction = Transaction::where('check_out', '>=' , $p)->get();
        $transactionexpired = Transaction::where('check_out', '<' , $p)->get();
         return view('dashboard.order.historyorder', compact('transaction', 'transactionexpired', 'p'));
    }
    public function create_identity(){
        $uri = Route::currentroutename();
        return view('dashboard.order.createidentity', compact('uri'));
    }

    public function post_identity(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'birthdate' => 'nullable',
            'jk' => 'nullable',
            'job' => 'nullable',
            'address' => 'nullable'
        ]);
        $cus = Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'jk' => $request->jk,
            'job' => $request->job,
            'birthdate' => $request->birthdate
        ]);
        User::create([
            'c_id' => $cus->id,
            'username' => $request->username,
            'telp' => $request->telp,
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => 0,
        ]);
        $c_id = $cus->id;
        // dd($c_id);
        Alert::success('success', 'success');
        return Redirect::route('countperson', array('id' =>$c_id));

    }

    public function viewperson($c_id){
        $uri = Route::currentroutename();
        return view('dashboard.order.viewcountperson', compact('uri', 'c_id'));
    }
    public function chooseroom(ChooseRoomRequest $request, Customer $customer){
        $uri = Route::currentroutename();
        // $count = $request->count;
        // $c_id = $request->c_id;
        $stayfrom = $request->from;
        $stayto = $request->to;
        $occupiedRoomId = $this->getOccupiedRoomID($request->from, $request->to);
        $rooms = $this->getUnocuppiedroom($request, $occupiedRoomId);
        $roomsCount = $this->countUnocuppiedroom($request, $occupiedRoomId);
        // dd($roomsCount);
        return view('dashboard.order.chooseroom', compact('uri', 'roomsCount', 'rooms', 'stayfrom', 'stayto'));
    }
    public function confirmation(){
        $uri = Route::currentroutename();
        // dd($uri);
        return view('dashboard.order.confirmation', compact('uri'));
    }






    private function getUnocuppiedroom($request, $occupiedRoomId)
    {
        $rooms = Room::with('type', 'status')
            ->where('capacity', '>=', $request->count)
            ->whereNotIn('id', $occupiedRoomId)->get();

        if (!empty($request->sort_name)) {
            $rooms = $rooms->orderBy($request->sort_name, $request->sort_type);
        }

        // $rooms = $rooms
        //     ->orderBy('capacity')
        //     ->paginate(5);

        return $rooms;
    }

    private function countUnocuppiedroom($request, $occupiedRoomId)
    {
        return Room::with('type', 'status')
            ->where('capacity', '>=', $request->count)
            ->whereNotIn('id', $occupiedRoomId)
            ->orderBy('price')
            ->orderBy('capacity')
            ->count();
    }

    private function getOccupiedRoomID($stayfrom, $stayto)
    {
        $occupiedRoomId = Transaction::where([['check_in', '<=', $stayfrom], ['check_out', '>=', $stayto]])
            ->orWhere([['check_in', '>=', $stayfrom], ['check_in', '<=', $stayto]])
            ->orWhere([['check_out', '>=', $stayfrom], ['check_out', '<=', $stayto]])
            ->pluck('room_id');
        return $occupiedRoomId;
    }
}
