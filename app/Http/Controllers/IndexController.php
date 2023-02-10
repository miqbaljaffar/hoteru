<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function pesan(){
        $uri = Route::currentRouteName();
        // dd($uri);
        return view('pesan',compact('uri'));
    }
}
