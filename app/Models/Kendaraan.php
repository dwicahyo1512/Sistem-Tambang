<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kendaraan_user_id',
        'nama',
        'img',
        'type',
        'bahan_bakar',
        'konsumsi_bbm',
        'jadwal_service',
        'keterangan',
        'status',
        'persetujuan',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'kendaraan_user_id')->select('id', 'name', 'email');
    }
}
