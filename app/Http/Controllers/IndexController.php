<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\Facility; // Pastikan ini di-import
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class IndexController extends Controller
{
    /**
     * Menampilkan halaman utama (homepage).
     */
    public function index()
    {
        // Mengambil 3 kamar secara acak untuk ditampilkan di homepage
        $rooms = Room::with('type', 'images')->inRandomOrder()->limit(3)->get();
        $facilities = Facility::all();

        return view('index', compact('rooms', 'facilities'));
    }

    /**
     * REFAKTOR: Menampilkan halaman daftar kamar dengan filter pencarian.
     * Logika pencarian yang kompleks kini ditangani oleh Query Scope di Model.
     */
    public function room(Request $request)
    {
        // Validasi input dasar
        $request->validate([
            'from' => 'nullable|date',
            'to' => 'nullable|date|after_or_equal:from',
            'count' => 'nullable|integer|min:1',
        ]);

        // Memulai query builder untuk Room
        $roomQuery = Room::query();

        // Jika ada input tanggal, gunakan scope 'availableFor'
        if ($request->filled('from') && $request->filled('to')) {
            $roomQuery->availableFor($request->from, $request->to);
        }

        // Jika ada input jumlah tamu, filter berdasarkan kapasitas
        // 'when' hanya akan menjalankan closure jika kondisi pertama true.
        $roomQuery->when($request->filled('count'), function ($query) use ($request) {
            return $query->where('capacity', '>=', $request->count);
        });

        // Ambil hasil query dengan relasi dan paginasi
        $rooms = $roomQuery->with('type', 'status', 'images')->latest()->paginate(9);

        return view('frontend.rooms', [
            'rooms' => $rooms,
            'roomsCount' => $rooms->total(), // Menggunakan total dari paginator
            'request' => $request // Kirim request untuk mengisi ulang form
        ]);
    }

    /**
     * Menampilkan halaman fasilitas.
     * Mengambil data dari database agar dinamis.
     */
    public function facility()
    {
        $facilities = Facility::latest()->get();
        return view('frontend.facilities', compact('facilities'));
    }

    /**
     * Menampilkan halaman kontak.
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * Menampilkan halaman "Tentang Kami" dengan statistik.
     */
    public function about()
    {
        $stats = [
            'rooms' => Room::count(),
            'customers' => Customer::count(),
            'transactions' => Transaction::count(),
        ];
        return view('frontend.about', compact('stats'));
    }

    /**
     * (Asumsi) Menampilkan halaman untuk memesan, bisa dihapus jika tidak relevan.
     */
    public function pesan()
    {
        $uri = Route::currentRouteName();
        return view('pesan', compact('uri'));
    }
}
