<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        $user = User::where('is_admin', 0)->get();
        // dd($user);
        $p = $user->count();
        return view('dashboard.user.index', compact('p','user'));
    }

    public function create(){
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
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
            'password' => bcrypt($request->password),
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
        if(auth()->guest()){
            return redirect('/login');
        }
        if(auth()->user()->is_admin == 0){
            abort(404);
        }
        return view('dashboard.user.edit', compact('user'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        $p = User::findOrFail($id);
        $p->update($request->all());
        Alert::success('Success', 'Data berhasil di edit');
        return redirect('/dashboard/user');
    }
    public function updatefront(Request $request, $id){
        // dd($request->all())
        $p = User::findOrFail($id);
        $c = Customer::findOrFail($p->Customer->id);
        // dd($c);
        $request->validate([
            'name' => 'nullable',
            'username' => 'nullable',
            'email' => 'nullable',
            'telp' => 'nullable',
            'address' => 'nullable',
            'jk' => 'nullable',
            'job' => 'nullable',
        ]);
        $c->update([
            'name' => $request->name,
            'address' => $request->address,
            'jk' => $request->jk,
            'job' => $request->job,
        ]);

        $p->update([
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->telp,
        ]);
        Alert::success('Success', 'Data berhasil di edit');
        return redirect('/myaccount');
    }

    public function delete($id){
        $p = User::findORFail($id);
        // dd($p);
        $p->delete();
        Alert::success('Success', 'Data berhasil di hapus');
        return back();
    }

    public function profile(){
        if(auth()->guest()){
            return redirect('/login');
        }
        $user = Auth()->user();
        // dd($user);
        // dd($user);
        return view('user.profile', compact('user'));
    }

    public function cusedit(){
        if(auth()->guest()){
            return redirect('/login');
        }
        $user = Auth()->user();
        return view('user.edit',compact('user'));
    }

    public function history(){
        if(auth()->guest()){
            return redirect('/login');
        }
        $id = Auth()->user()->Customer->id;
        $user = Auth()->user();
        $his = Payment::where('c_id', $id)->orderby('id', 'desc')->paginate(10);
        return view('user.history', compact('his', 'user'));
    }
}
