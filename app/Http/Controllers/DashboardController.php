<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        return view('dashboard.index');
    }
}
