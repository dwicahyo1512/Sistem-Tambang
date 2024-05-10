<?php

namespace App\Exports;

use App\Models\Kendaraan;
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
            'Nama', // Label untuk kolom pertama
            'Type',
            'BahanBakar',
            'KonsumsiBBM',
            'JadwalService',
        ];
    }

    public function collection()
    {
        $kendaraans = Kendaraan::all(); // Ambil data kendaraan dari model

        $data = []; // Inisialisasi array kosong
        foreach ($kendaraans as $kendaraan) {
            $data[] = [
                'Nama' => $kendaraan->nama,
                'Type' => $kendaraan->type,
                'BahanBakar' => $kendaraan->bahan_bakar,
                'KonsumsiBBM' => $kendaraan->konsumsi_bbm,
                'JadwalService' => $kendaraan->jadwal_service,
            ];
        }

        return collect($data);
    }
}
