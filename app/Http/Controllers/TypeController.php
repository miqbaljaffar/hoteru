<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TypeController extends Controller
{

    public function index(){
        $type = Type::get();
        $p = $type->count();
        // dd($p);
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        return view('dashboard.type.index', compact('p','type'));
    }

    public function create(){
                if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $p = Type::count();
        return view('dashboard.type.create', compact('p'));
    }

    public function post(Request $request){
        $request->validate([
            'name' => 'required',
            // 'code' => 'required',
            'info' => 'required'
        ]);

        Type::create([
            'name' => $request->name,
            // 'code' => $request->code,
            'info' => $request->info
        ]);

        Alert::success('Success', 'Data berhasil Ditambahkan');
        return redirect('/dashboard/data/type');
    }

    public function edit($id){
                if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $type = Type::findOrFail($id);
        return view('dashboard.type.edit', compact('type'));
    }

    public function update(Request $request, $id){
        $p = Type::findOrFail($id);
        $p->update($request->all());
        Alert::success('Success', 'Data berhasil Diedit');
        return redirect('/dashboard/data/type');
    }

    public function delete($id){
        $p = Type::findOrFail($id);
        // dd($id);
        $p->delete();
        Alert::success('Success', 'Data berhasil dihapus');
        return back();
    }
}
