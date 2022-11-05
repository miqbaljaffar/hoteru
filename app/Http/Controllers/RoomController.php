<?php

namespace App\Http\Controllers;

use App\Models\Room;
// use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    public function index(){
        $room = Room::get();
        $p = Room::get()->count();
        // dd($room);
        return view('dashboard.room.index', compact('room','p'));
    }

    public function create(){
        $p = Room::get()->count();
        // dd($p);
        return view('dashboard.room.create', compact('p'));
    }
    public function post(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'no' => 'required',
            'type' => 'required',
            'capacity' => 'required',
            'price' => 'required',
            'status' => 'nullable',
            'image' => 'nullable|image|file|max:3072'
        ]);

        // if($request->file('image')){
        //     $image = $validatedData['image'] = $request->file('image')->store('product-images');
        // }

        Room::create([
            'no' => $request->no,
            'type' => $request->type,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'status' => $request->status,
            // 'image' => $image
        ]);

       Alert::success('Success','Data berhasil ditambahkan');
        return redirect('/dashboard/room');
    }
}
