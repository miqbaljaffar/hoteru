<?php

namespace App\Http\Controllers;

use App\Models\ImageRoom;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // REFAKTOR: Gunakan Storage facade, lebih aman & best practice
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    /**
     * REFAKTOR: Terapkan middleware untuk semua method KECUALI yang untuk frontend.
     * Ini membuat semua method dashboard aman secara default.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['roomshow', 'roomshowpost']);
    }

    /**
     * Menampilkan daftar semua kamar di dashboard.
     * Tidak perlu cek auth manual lagi.
     */
    public function index()
    {
        // Menggunakan eager loading dengan with(['type', 'status'])
        $rooms = Room::with(['type', 'status'])->latest()->paginate(10);
        return view('dashboard.room.index', ['rooms' => $rooms]);
    }
    
    /**
     * Menampilkan form untuk membuat kamar baru.
     */
    public function create()
    {
        // Pastikan nama variabelnya adalah $status (singular)
        $status = RoomStatus::all();

        // Ubah nama variabel dari $types menjadi $type (singular)
        $type = Type::all();

        // Kirimkan variabel $status dan $type ke view
        return view('dashboard.room.create', compact('status', 'type'));
    }

    /**
     * Menyimpan kamar baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi semua input, termasuk file gambar dengan tipe file spesifik
        $validatedData = $request->validate([
            'no' => 'required|string|unique:rooms,no',
            'type_id' => 'required|exists:types,id',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'status_id' => 'required|exists:room_statuses,id',
            'info' => 'required|string',
            // --- PERUBAHAN DI BARIS INI ---
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Menambahkan aturan mimes
        ]);

        // 2. Simpan gambar ke storage
        $imagePath = $request->file('image')->store('room-images', 'public');

        // 3. Buat data kamar baru (tanpa gambar)
        $room = Room::create([
            'no' => $validatedData['no'],
            'type_id' => $validatedData['type_id'],
            'capacity' => $validatedData['capacity'],
            'price' => $validatedData['price'],
            'status_id' => $validatedData['status_id'],
            'info' => $validatedData['info'],
        ]);

        // 4. Buat data gambar dan hubungkan dengan kamar yang baru dibuat
        $room->images()->create(['image' => $imagePath]);

        Alert::success('Success', 'Data kamar berhasil ditambahkan');
        return redirect()->route('dashboard.rooms.index');
    }

    /**
     * Menampilkan detail satu kamar di dashboard.
     * REFAKTOR: Menggunakan Route Model Binding (Room $room).
     */
    public function show(Room $room)
    {
        $room->load('images', 'type', 'status'); // Eager load relasi
        return view('dashboard.room.show', compact('room'));
    }

    /**
     * Menampilkan form untuk mengedit kamar.
     * REFAKTOR: Menggunakan Route Model Binding (Room $room).
     */
    public function edit(Room $room)
    {
        $statuses = RoomStatus::all();
        $types = Type::all();
        return view('dashboard.room.edit', compact('room', 'statuses', 'types'));
    }

    /**
     * Mengupdate data kamar di database.
     * REFAKTOR: Menggunakan Route Model Binding (Room $room) dan method PUT/PATCH.
     */
    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'no' => 'required|string|unique:rooms,no,' . $room->id,
            'type_id' => 'required|exists:types,id',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'status_id' => 'required|exists:room_statuses,id',
            'info' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Tambahkan validasi untuk gambar
        ]);

        $room->update($validatedData);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($room->images()->exists()) {
                $oldImage = $room->images()->first();
                Storage::disk('public')->delete($oldImage->image);
                $oldImage->delete();
            }

            // Unggah gambar baru
            $imagePath = $request->file('image')->store('room-images', 'public');
            $room->images()->create(['image' => $imagePath]);
        }

        Alert::success('Success', 'Data kamar berhasil diedit');
        return redirect()->route('dashboard.rooms.index');
    }

    /**
     * Menghapus data kamar.
     * REFAKTOR: Menggunakan Route Model Binding (Room $room) dan method DELETE.
     */
    public function destroy(Room $room)
    {
        // Hapus juga semua gambar terkait dari storage
        foreach($room->images as $image) {
            Storage::disk('public')->delete($image->image);
        }
        $room->delete(); // Ini akan otomatis menghapus relasi (images) karena onDelete('cascade')
        Alert::success('Success', 'Data kamar berhasil dihapus');
        return back();
    }


    // --- Manajemen Gambar ---

    /**
     * Menampilkan halaman untuk menambah/melihat gambar kamar.
     * REFAKTOR: Menggunakan Route Model Binding (Room $room).
     */
    public function addimage(Room $room)
    {
        $room->load('images');
        return view('dashboard.room.image', compact('room'));
    }

    /**
     * Menyimpan gambar baru untuk sebuah kamar.
     */
    public function storeimage(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|file|max:2048', // Batasi ukuran file
        ]);

        $imagePath = $request->file('image')->store('room-images', 'public');

        $room->images()->create(['image' => $imagePath]);

        Alert::success('Success', 'Foto Telah Ditambahkan');
        return back();
    }

    /**
     * Menghapus satu gambar kamar.
     * REFAKTOR: Menggunakan Route Model Binding (ImageRoom $image).
     */
    public function deleteimage(ImageRoom $image)
    {
        // Gunakan Storage facade untuk menghapus file. Lebih aman.
        Storage::disk('public')->delete($image->image);
        $image->delete();

        Alert::success('Success', 'Gambar berhasil dihapus');
        return back();
    }


    // --- Method untuk Frontend (Publik) ---

    /**
     * Menampilkan detail kamar di halaman frontend.
     */
    public function roomshow(Request $request, $no)
    {
        $room = Room::where('no', $no)->with('images', 'type')->firstOrFail();
        $customer = auth()->user()->customer ?? null;
        return view('frontend.room', compact('room', 'customer', 'request'));
    }

    /**
     * Digunakan jika ada form filter di halaman detail kamar.
     */
    public function roomshowpost(Request $request)
    {
        $room = Room::where('no', $request->no)->with('images', 'type')->firstOrFail();
        $customer = auth()->user()->customer ?? null;
        return view('frontend.room', compact('room', 'customer', 'request'));
    }
}
