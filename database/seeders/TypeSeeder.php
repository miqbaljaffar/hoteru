<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    public function run()
    {
        // Data 5 tipe kamar sederhana
        $types = [
            ['id' => 1, 'name' => 'Standard', 'info' => 'Kamar standar dengan fasilitas dasar.'],
            ['id' => 2, 'name' => 'Superior', 'info' => 'Kamar lebih luas dari Standard.'],
            ['id' => 3, 'name' => 'Deluxe', 'info' => 'Kamar mewah dengan pemandangan indah.'],
            ['id' => 4, 'name' => 'Suite', 'info' => 'Suite dengan ruang tamu terpisah.'],
            ['id' => 5, 'name' => 'Family', 'info' => 'Kamar luas untuk keluarga.'],
        ];

        // Nonaktifkan pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan tabel sebelum diisi
        DB::table('types')->truncate();

        // Aktifkan kembali pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Tambahkan timestamp dan masukkan data
        $now = now();
        $typesWithTimestamps = array_map(function ($type) use ($now) {
            $type['created_at'] = $now;
            $type['updated_at'] = $now;
            return $type;
        }, $types);

        DB::table('types')->insert($typesWithTimestamps);
    }
}
