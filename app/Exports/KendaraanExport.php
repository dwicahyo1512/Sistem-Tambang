<?php

namespace App\Exports;

use App\Models\Kendaraan;
use App\Models\RiwayatKendaraan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KendaraanExport implements FromCollection, WithTitle, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    
    public function title(): string
    {
        return 'Kendaraans'; // Judul sheet Excel
    }

    public function headings(): array
    {
        return [
            'Nama Driver', // Label untuk kolom pertama
            'Nama Kendaraan', // Label untuk kolom pertama
            'Nama Penyetuju', // Label untuk kolom pertama
            'Type',
            'Bahan Bakar',
            'Konsumsi BBM',
            'Jadwal Service',
            'Keterangan',
            'Tanggal',
        ];
    }

    public function collection()
    {
        if (!$this->data->isEmpty()) {
            // Data tidak kosong, kembalikan koleksi yang dihasilkan dari data
            $data = [];
    
            foreach ($this->data as $kendaraan) {
                $data[] = [
                    'Nama Driver' => $kendaraan->nama_driver,
                    'Nama Kendaraan' => $kendaraan->nama_kendaraan,
                    'Nama Pool' => $kendaraan->nama_pool,
                    'Type' => $kendaraan->type,
                    'BahanBakar' => $kendaraan->bahan_bakar,
                    'KonsumsiBBM' => $kendaraan->konsumsi_bbm,
                    'JadwalService' => $kendaraan->jadwal_service,
                    'Keterangan' => $kendaraan->keterangan,
                    'Dibuat' => $kendaraan->created_at, // Perubahan disini
                ];
            }
    
            return collect($data);
        } else {
            // Data kosong, kembalikan data kosong dengan pesan 'Tidak ada data'
            return collect([
                [
                    'Tidak ada data',
                ]
            ]);
        }
    }
    
}
