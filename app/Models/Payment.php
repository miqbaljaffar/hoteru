<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'payments';

    public function Transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'c_id');
    }
}
