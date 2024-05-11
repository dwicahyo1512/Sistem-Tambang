<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'kendaraan_id',
        'pool_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class,'kendaraan_id');
    }
    public function pool()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
