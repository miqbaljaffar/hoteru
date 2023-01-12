<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    public function Customer(){
        return $this->belongsTo(Customer::class, 'cus_id','id');
    }
    public function Room(){
        return $this->belongsTo(Room::class, 'id');
    }
}
