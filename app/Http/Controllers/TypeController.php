<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TypeController extends Controller
{

    public function index()
    {
        // Menggunakan paginate dan hanya mengirimkan variabel $type
        $type = Type::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.type.index', [
            'type' => $type
        ]);
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

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'info' => 'required'
        ]);

        Type::create([
            'name' => $request->name,
            'info' => $request->info
        ]);

        Alert::success('Success', 'Data berhasil Ditambahkan');
        return redirect()->route('dashboard.types.index');
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

    public function update(Request $request, Type $type){ // Gunakan Route Model Binding
        $type->update($request->all());
        Alert::success('Success', 'Data berhasil Diedit');
        return redirect()->route('dashboard.types.index');
    }

    public function destroy(Type $type) // Gunakan Route Model Binding di sini
    {
        // Karena kita menggunakan route model binding, Laravel secara otomatis
        // akan menemukan 'Type' berdasarkan ID di URL.
        // Jadi, kita tidak perlu lagi mencari manual dengan Type::where(...) atau Type::findOrFail(...)

        $type->delete(); // Langsung panggil metode delete() pada instance $type

        Alert::success('Success', 'Data berhasil dihapus');
        return back();
    }
}
