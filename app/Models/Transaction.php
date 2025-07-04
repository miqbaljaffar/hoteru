<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'total_price',
        'total_payment',
        'remaining_balance'
    ];


    // --- RELASI DATABASE ---

    public function customer()
    {
        // Pastikan foreign key 'customer_id' sudah benar sesuai tabel database Anda
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    // --- ACCESSORS ---
    // Atribut ini bisa dipanggil seperti properti biasa, contoh: $transaksi->total_price

    public function getTotalPriceAttribute(): float
    {
        // Menghitung selisih hari
        $days = $this->check_in->diffInDays($this->check_out);

        // Mengembalikan total harga (harga kamar * jumlah hari)
        return $this->room->price * $days;
    }

    public function getTotalPaymentAttribute(): float
    {
        // Menjumlahkan semua pembayaran yang statusnya tidak 'Pending'
        return $this->payments()->where('status', '!=', 'Pending')->sum('price');
    }

    public function getRemainingBalanceAttribute(): float
    {
        // Menghitung sisa tagihan
        return $this->total_price - $this->total_payment;
    }


    // --- METHOD BANTU ---

    public function getDateDifferenceWithPlural(): string
    {
        $days = $this->check_in->diffInDays($this->check_out);
        return $days . ' ' . Str::plural('Day', $days);
    }
}
