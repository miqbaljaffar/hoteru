<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    /**
     * BARU: Menambahkan appends agar accessor otomatis disertakan.
     */
    protected $appends = ['total_price', 'total_payment', 'remaining_balance', 'minimum_down_payment'];

    // --- RELASI ---

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'c_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // --- ACCESSORS (BARU) ---

    public function getTotalPriceAttribute(): float
    {
        if (!$this->room) {
            return 0;
        }
        $days = $this->check_in->diffInDays($this->check_out);
        return $this->room->price * $days;
    }

    public function getTotalPaymentAttribute(): float
    {
        return $this->payments()->where('status', '!=', 'Pending')->sum('price');
    }

    public function getRemainingBalanceAttribute(): float
    {
        return $this->total_price - $this->total_payment;
    }

    public function getMinimumDownPaymentAttribute(): float
    {
        return $this->total_price * 0.5;
    }

    public function getDateDifferenceWithPlural(): string
    {
        $day = $this->check_in->diffInDays($this->check_out);
        return $day . ' ' . Str::plural('Day', $day);
    }
}
