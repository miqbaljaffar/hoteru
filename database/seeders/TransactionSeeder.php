<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\Payments;
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
        // Transaction::create([
        //     'c_id' => 1,
        //     'room_id' => 2,
        //     'check_in' => Carbon::now(),
        //     'check_out' => Carbon::tomorrow(),
        //     'status' => 'Reservation'
        // ]);

        PaymentMethod::create([
            'nama' => 'OFFLINE',
            'no_rek' => null,
        ]);

        PaymentMethod::create([
            'nama' => 'BCA',
            'no_rek' => '5221-8420-7788-2024',
        ]);
        PaymentMethod::create([
            'nama' => 'BRI',
            'no_rek' => '7632-01-007520-53-0',
        ]);
        PaymentMethod::create([
            'nama' => 'BNI',
            'no_rek' => '099-5653-265',
        ]);
        PaymentMethod::create([
            'nama' => 'BTN',
            'no_rek' => '00461-01-50-0029320-0',
        ]);
         PaymentMethod::create([
            'nama' => 'Mandiri',
            'no_rek' => '113-00-1522616-4',
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022,01,05),
            'check_out' => Carbon::createFromDate(2022,01,07),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 2,
            'invoice' => 'INV021CJ23KA',
            'transaction_id' => 1,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022,01,05),
        ]);


        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022,02,01),
            'check_out' => Carbon::createFromDate(2022,02,02),
            'status' => 'Reservation'
        ]);
        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 2,
            'invoice' => 'INVB0912AS2',
            'transaction_id' => 2,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022,02,01),
        ]);


        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022,02,03),
            'check_out' => Carbon::createFromDate(2022,02,04),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 2,
            'invoice' => 'INV01FAJ412',
            'transaction_id' => 3,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022,02,03),
        ]);



        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022,03,04),
            'check_out' => Carbon::createFromDate(2022,03,05),
            'status' => 'Reservation'
        ]);
        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 2,
            'invoice' => 'INV4KU5UK4',
            'transaction_id' => 4,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022,03,04),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022,03,06),
            'check_out' => Carbon::createFromDate(2022,03,07),
            'status' => 'Reservation'
        ]);
        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 5,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022,03,06),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022,04,02),
            'check_out' => Carbon::createFromDate(2022,04,03),
            'status' => 'Reservation'
        ]);
        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 6,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022,04,02),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022,04,04),
            'check_out' => Carbon::createFromDate(2022,04,05),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 7,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022,04,04),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022,04,06),
            'check_out' => Carbon::createFromDate(2022,04,07),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 8,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022,04,06),
        ]);


    }
}
