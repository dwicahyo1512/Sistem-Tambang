<?php

namespace App\Http\Controllers;

use App\Exports\KendaraanExport;
use App\Models\Kendaraan;
use App\Models\RiwayatKendaraan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    //
    public function index()
    {
        //
        $kendaraans = RiwayatKendaraan::paginate(10);
        return view('laporan.index', compact('kendaraans'));
    }

    public function export(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'date-range' => 'required',
        ]);
    
        // Ambil rentang tanggal yang dipilih
        $dateRange = $request->input('date-range');
    
        // Pisahkan rentang tanggal menjadi tanggal awal dan akhir
        [$startDate, $endDate] = explode(' to ', $dateRange);
    
        // Ambil data dari database berdasarkan rentang tanggal yang dipilih
        $data = RiwayatKendaraan::selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d') AS formatted_created_at")
        ->select('*')
        ->whereBetween('created_at', [
            Carbon::parse($startDate)->startOfDay(),
            Carbon::parse($endDate)->endOfDay()
        ])->get();
    
    
        // dd($data);
        // Generate nama file Excel
        $fileName = 'periodic_export_' . now()->format('YmdHis') . '.xlsx';
    
        // Gunakan Laravel Excel untuk menghasilkan file Excel
        return Excel::download(new KendaraanExport($data), $fileName);
    }
}
