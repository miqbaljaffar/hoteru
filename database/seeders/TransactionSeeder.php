<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'cus_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::now(),
            'check_out' => Carbon::tomorrow(),
            'status' => 'active'
        ]);
        Transaction::create([
            'cus_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2023,01,05),
            'check_out' => Carbon::yesterday(),
            'status' => 'Tidak Aktif'
        ]);
    }
}
