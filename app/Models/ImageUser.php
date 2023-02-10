<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'image_users';
    public function User(){
        return $this->belongsTo(User::class);
    }
}
