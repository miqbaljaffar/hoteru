<?php

namespace App\Http\Controllers;

use App\Models\RoomStatus; // Model yang benar adalah RoomStatus
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StatusController extends Controller
{

    public function index(){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $status = RoomStatus::orderBy('id','desc')->get();
        $p = $status->count();
        return view('dashboard.status.index', compact('p','status'));
    }

    public function create(){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        return view('dashboard.status.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'info' => 'required'
        ]);

        RoomStatus::create([
            'name' => $request->name,
            'code' => $request->code,
            'info' => $request->info
        ]);

        Alert::success('Success', 'Data berhasil Ditambahkan');
        return redirect()->route('dashboard.statuses.index');
    }

    public function edit(RoomStatus $status){
        return view('dashboard.status.edit', compact('status'));
    }

    public function update(Request $request, RoomStatus $status){
        $status->update($request->all());
        Alert::success('Success', 'Data berhasil Diedit');
        return redirect()->route('dashboard.statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomStatus  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomStatus $status) // <-- PERBAIKAN DI SINI
    {
        $status->delete();

        Alert::success('Success', 'Data berhasil dihapus'); // Menggunakan SweetAlert
        return redirect()->route('dashboard.statuses.index');
    }
}
