<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    public function register()
    {
        return view('login.register');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->has('remember');
        if (Auth::attempt($request->only('username', 'password'), $remember)) {
            if ($remember) {
                Cookie::queue('username', $request->username, 1440);
                Cookie::queue('password', $request->password, 1440);
            }
            Alert::success('Success', 'Login berhasil');
            return redirect()->intended('/');
        }

        Alert::error('Error', 'Username atau Password salah.');
        return redirect('/login');
    }

    /**
     * Method store yang sudah diperbarui untuk validasi dan simpan email.
     */
    public function store(Request $request)
    {
        // 1. Tambahkan validasi untuk email
        $request->validate([
            'name'      => 'required|max:255',
            'username'  => ['required', 'min:3', 'max:255', 'unique:users'],
            'email'     => ['required', 'email:dns', 'unique:users'], // <-- Validasi email
            'password'  => ['min:3', 'max:255', 'required'],
        ]);

        if ($request->confirmation_password != $request->password) {
            Alert::error('Error', 'Konfirmasi password tidak cocok.');
            return redirect('/register')->withInput(); // kembali dengan input sebelumnya
        }

        $customer = Customer::create([
            'name' => $request->name
        ]);

        // 2. Simpan email saat membuat user baru
        User::create([
            'username' => $request->username,
            'email'    => $request->email, // <-- Simpan email
            'c_id'     => $customer->id,
            'password' => bcrypt($request->password)
        ]);

        Alert::success('Registrasi Berhasil', 'Akun Anda telah dibuat. Silakan login!');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Success', 'Berhasil Logout');
        return redirect('/login');
    }

    // == FUNGSI LUPA PASSWORD ==
    public function showForgotPasswordForm()
    {
        return view('login.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(['status' => __($status)]);
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm($token)
    {
        return view('login.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:3',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        }

        return back()->withErrors(['email' => [__($status)]]);
    }
}
