<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kendaraan_id',
        'nama_driver',
        'nama_kendaraan',
        'nama_pool',
        'type',
        'bahan_bakar',
        'konsumsi_bbm',
        'jadwal_service',
        'keterangan',
    ];
}
