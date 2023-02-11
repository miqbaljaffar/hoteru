<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        $room = Room::paginate(3);
        // $p = Room::where('');
        // dd($room);
        return view('index', compact('room'));
    }

    public function pesan(){
        $uri = Route::currentRouteName();
        // dd($uri);
        return view('pesan',compact('uri'));
    }
    public function room(Request $request){
        if($request->check_in){
            $room = Room::where();
        }
        $room = Room::paginate(9);
        return view('frontend.rooms', compact('room'));
    }
}
