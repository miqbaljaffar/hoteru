<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\Type;
// use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    public function index(){
        $room = Room::orderBy('id', 'desc')->get();
        $p = Room::get()->count();
        // dd($room);
        return view('dashboard.room.index', compact('room','p'));
    }

    public function create(){
        $status = RoomStatus::get();
        $type = Type::get();
        // dd($type);
        return view('dashboard.room.create', compact('type', 'status'));
    }
    public function post(Request $request){
        // dd($request);
        $request->validate([
            'no' => 'required',
            'type_id' => 'required',
            'capacity' => 'required',
            'price' => 'required',
            'status_id' => 'required',
            'info' => 'required'
            // 'image' => 'nullable|image|file|max:3072'
        ]);

        // if($request->file('image')){
        //     $image = $validatedData['image'] = $request->file('image')->store('product-images');
        // }

        Room::create([
            'no' => $request->no,
            'type_id' => $request->type_id,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'status_id' => $request->status_id,
            'info' => $request->info
            // 'image' => $image
        ]);

       Alert::success('Success','Data berhasil ditambahkan');
        return redirect('/dashboard/room');
    }

    public function delete($id){
        // dd($id);
        $p = Room::FindOrFail($id);
        $p->delete($p);
        Alert::success('Success','Data berhasil dihapus');
        return back();
    }

    public function edit($id){
        $status = RoomStatus::get();
        $type = Type::get();
        $p = Room::findOrFail($id);
        // dd($p);
        return view('dashboard.room.edit', compact('status', 'type','p'));
    }

    public function update(Request $request, $id){
        $p = Room::findOrFail($id);
        $p->update($request->all());
        Alert::success('Success','Data berhasil diedit');
        return redirect('/dashboard/room');
    }

    public function show(Room $room){
        return view('dashboard.room.show', compact('room'));
    }
}
