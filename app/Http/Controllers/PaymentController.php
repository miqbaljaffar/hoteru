<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //
    public function index(){
        $pay = Payment::with('Customer', 'Transaction')->orderBy('id','desc')->get();
        return view('dashboard.payment.index', compact('pay'));
    }
    public function debt($id){
        // dd($id);
        $transaction = Transaction::where('id', $id)->with('Customer', 'Room')->first();
        return view('dashboard.order.payment', compact('transaction'));
    }

    public function pays(Request $request){
        $transaction = Transaction::where('id', $request->id)->first();
        $insufficient = $transaction->getTotalPrice() - $transaction->getTotalPayment();
        $request->validate([
            'payment' => 'required|numeric|lte:' . $insufficient
        ]);
        if(!empty($request->downPayment)){
            $price = $request->downPayment;
        } else {
            $price = $request->payment;
        }
        $count = Payment::count() + 1;
        $payment = Payment::create([
            'c_id' => $transaction->Customer->id,
            'transaction_id' => $transaction->id,
            'price' => $price,
            'invoice' => '0'. $request->customer. 'INV'. $count . Str::random(4),
            'status' => "Down Payment"
        ]);
        Alert::success('success', 'p');
        return redirect('/dashboard/order');

    }

    public function invoice($id, Request $request){
        if($request['nid']){
            $notif = Notifications::where('id', $request->nid)->first();
            $notif->status = 'read';
            $notif->read_at = Carbon::now();
            $notif->save();
        }
        $pay = Payment::where('id', $id)->first();
        return view('dashboard.payment.invoice', compact('pay'));

        // dd($pay);
    }
}
