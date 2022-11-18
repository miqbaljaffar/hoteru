<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function register(){
        return view('login.register');
    }

    public function authenticate(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required']);
            // dd($request);
        $remember = $request->has('remember') ? true : false;
        $minutes = 1440;
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $remember)){
            if($request->has('remember')){
                Cookie::queue('username', $request->username, $minutes);
                Cookie::queue('password', $request->password, $minutes);}
            // dd($tes);
            return redirect()->intended('/')->with('success','Login anda berhasil, Welcome back');
            Alert::success('Success', 'Login berhasil');
        }
        Alert::error('Error', 'Gagal');
        return back();
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => ['min:3', 'max:255','required'],
            'confirmation_password' => ['required','same:password','min:3', 'max:255']
        ]);

        // dd($validated);

        $validated['password'] = bcrypt($validated['password']);

       User::create($validated);

       $request->session();
       Alert::success('Success', 'Login buru kontol');
       return redirect('/login')->with('success', 'Registration successfull. Please Login');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');}

}
