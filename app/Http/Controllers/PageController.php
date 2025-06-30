<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\Transaction;

class PageController extends Controller
{
    public function about()
    {
        // Menghitung jumlah kamar
        $r = Room::count();

        // Menghitung jumlah customer (asumsi role 'user' adalah customer)
        $c = User::where('role', 'user')->count();

        // Menghitung jumlah transaksi
        $t = Transaction::count();

        // Mengirim data ke view
        return view('frontend.about', compact('r', 'c', 't'));
    }
}
