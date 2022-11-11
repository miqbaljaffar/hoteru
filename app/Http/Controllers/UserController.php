<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(){
        $user = User::get();
        $p = $user->count();
        return view('dashboard.user.index', compact('p','user'));
    }

    public function create(){
        return view('dashboard.user.create');
    }

    public function post(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'telp' => 'nullable|numeric',
            'birthdate' => 'nullable',
            'jk' => 'required',
            'address' => 'nullable',
            'image' => 'nullable'
        ]);
        // dd($request);
        if($request->file('image')){
            $image = $validatedData['image'] = $request->file('image')->store('user-images');
        }
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'telp' => $request->telp,
            'birthdate' => $request->birthdate,
            'jk' => $request->jk,
            'address' => $request->address,
            // 'image' => $image
        ]);

        Alert::success('Success', 'Data berhasil di buat');
        return redirect('/dashboard/user');
    }
    public function edit(User $user){
        return view('dashboard.user.edit', compact('user'));
    }
    public function update(Request $request, $id){
        $p = User::findOrFail($id);
        $p->update($request->all());
        Alert::success('Success', 'Data berhasil di edit');
        return redirect('/dashboard/user');
    }

    public function delete($id){
        $p = User::findORFail($id);
        // dd($p);
        $p->delete();
        Alert::success('Success', 'Data berhasil di hapus');
        return back();
    }
}
