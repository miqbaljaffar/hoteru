<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Room extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'rooms';

    // --- RELASI ANTAR MODEL ---

    public function status()
    {
        return $this->belongsTo(RoomStatus::class, 'status_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function images()
    {
        return $this->hasMany(ImageRoom::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }


    // --- QUERY SCOPE (BARU) ---

    /**
     * BARU: Query Scope untuk mencari kamar yang tersedia pada rentang tanggal tertentu.
     */
    public function scopeAvailableFor(Builder $query, string $checkIn, string $checkOut): Builder
    {
        return $query->whereDoesntHave('transactions', function ($q) use ($checkIn, $checkOut) {
            $q->where(function ($subQuery) use ($checkIn, $checkOut) {
                // Tumpang tindih di awal
                $subQuery->where([
                    ['check_in', '<=', $checkIn],
                    ['check_out', '>', $checkIn]
                ])
                // Tumpang tindih di akhir
                ->orWhere([
                    ['check_in', '<', $checkOut],
                    ['check_out', '>=', $checkOut]
                ])
                // Berada di dalam rentang
                ->orWhere([
                    ['check_in', '>=', $checkIn],
                    ['check_out', '<=', $checkOut]
                ]);
            });
        });
    }
}
