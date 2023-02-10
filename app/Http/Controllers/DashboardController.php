<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Termwind\Components\Raw;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }

        $p = Payment::get();
        $hasil = 0;
        foreach($p as $pp){
            $hasil += $pp->price;
        }

        $alltime = $hasil;
        // dd($alltime);
        // all time end --------------------------------
        $chart = $p->groupby(function($chart){
            return Carbon::parse($chart->created_at)->format('M');
        });

        $months = [];
        $count = [];
        foreach($chart as $month => $value){
            $months[] = $month;
            $total = 0;
            foreach($value as $pay){
                $total += $pay->price;
            }
            $count[$month] = $total;
        }
        // dd($count);
        $now = Carbon::now()->format('M');
        $monthcount = $count[$now];

        $n = Carbon::now()->format('m');
        $beforenow = $n - 1 - 1;
        $tomonth = Carbon::parse($beforenow)->format('M');
        $countbefore = $count[$tomonth];

        $persen = $monthcount / $countbefore * 10;
        // dd($persen);

        return view('dashboard.index', compact('alltime', 'count', 'monthcount', 'months', 'persen'));
    }
    public function notifiable(Request $request){
        // dd($request);
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        // $no = json_decode($notif->data)->message[5] . json_decode($notif->data)->message[6] . json_decode($notif->data)->message[7];

        return redirect('/dashboard/order', compact('no'));
    }

    public function markall(){
        $notif = Notifications::where('status', 'unread')->get();
        foreach($notif as $n){
            $n->status = 'read';
            $n->read_at = Carbon::now();
            $n->save();
        }
        Alert::success('success', 'sucess');
        return redirect('/dashboard/order');
    }
}
