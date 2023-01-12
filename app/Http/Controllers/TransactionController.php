<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
        $uri = Route::current()->uri();
        return view('dashboard.order.createidentity', compact('uri'));
    }

    public function viewperson(){
        $uri = Route::current()->uri();
        // dd($uri);
        return view('dashboard.order.viewcountperson', compact('uri'));
    }
    public function chooseroom(){
        $uri = Route::current()->uri();
        // dd($uri);
        return view('dashboard.order.chooseroom', compact('uri'));
    }
    public function confirmation(){
        $uri = Route::current()->uri();
        // dd($uri);
        return view('dashboard.order.confirmation', compact('uri'));
    }
}
