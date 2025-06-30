<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run()
    {
        // Data 5 kamar, pastikan `type_id` merujuk ke ID yang ada di TypeSeeder (1-5)
        $rooms = [
            ['id' => 1, 'type_id' => 1, 'status_id' => 1, 'no' => '101', 'capacity' => 2, 'price' => 500000, 'info' => 'Kamar standar nyaman dengan pemandangan kota.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'type_id' => 2, 'status_id' => 1, 'no' => '201', 'capacity' => 2, 'price' => 750000, 'info' => 'Kamar superior yang elegan dan lebih luas.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'type_id' => 3, 'status_id' => 1, 'no' => '301', 'capacity' => 3, 'price' => 1000000, 'info' => 'Kamar deluxe mewah dengan fasilitas premium.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'type_id' => 4, 'status_id' => 1, 'no' => '401', 'capacity' => 4, 'price' => 1500000, 'info' => 'Suite dengan ruang tamu terpisah untuk kenyamanan ekstra.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'type_id' => 5, 'status_id' => 1, 'no' => '501', 'capacity' => 5, 'price' => 1250000, 'info' => 'Kamar keluarga yang ideal untuk liburan bersama.', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Nonaktifkan pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan tabel sebelum diisi
        Room::truncate();

        // Aktifkan kembali pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Masukkan data ke database
        DB::table('rooms')->insert($rooms);
    }
}
