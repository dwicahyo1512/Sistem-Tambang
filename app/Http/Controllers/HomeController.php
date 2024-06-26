<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('super-admin')) {
            $userCount = User::count();
            $adminCount = User::role('super-admin')->count();
            $poolCount = User::role('pool')->count();
            $clientCount = User::role('client-users')->count();
            return view('dashboard.home', compact('adminCount', 'userCount', 'poolCount', 'clientCount'));
        } elseif (auth()->user()->hasRole('pool')) {
            // $kendaraan = Kendaraan::where('pool_id', auth()->id())->count();
            $kendaraansetuju = Kendaraan::where('pool_id', auth()->id())->where('persetujuan', 1)->count();
            $kendaraanbelumsetuju = Kendaraan::where('pool_id', auth()->id())->where('persetujuan', 0)->count();
            return view('dashboard.pool', compact('kendaraanbelumsetuju', 'kendaraansetuju'));
        } else {
            $kendaraanuser = Kendaraan::where('kendaraan_user_id', auth()->id())->with('user','pool')->first();
            return view('dashboard.driver', compact('kendaraanuser'));
        }
    }

    public function datagender($year)
    {
        // Inisialisasi array untuk menyimpan jumlah pengguna laki-laki dan perempuan per bulan
        $maleData = array_fill(0, 12, 0);
        $femaleData = array_fill(0, 12, 0);

        // Ambil data pengguna laki-laki
        $gendermaledate = User::where('gender', 'male')
            ->select(DB::raw('COUNT(*) as total_male, MONTH(created_at) as month'))
            ->whereYear('created_at', $year) // Ambil hanya data dari tahun yang diberikan
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Masukkan jumlah pengguna laki-laki ke dalam array sesuai dengan bulan
        foreach ($gendermaledate as $item) {
            $maleData[$item->month - 1] = $item->total_male;
        }

        // Ambil data pengguna perempuan
        $genderfemaledate = User::where('gender', 'female')
            ->select(DB::raw('COUNT(*) as total_female, MONTH(created_at) as month'))
            ->whereYear('created_at', $year) // Ambil hanya data dari tahun yang diberikan
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Masukkan jumlah pengguna perempuan ke dalam array sesuai dengan bulan
        foreach ($genderfemaledate as $item) {
            $femaleData[$item->month - 1] = $item->total_female;
        }

        // Gabungkan data laki-laki dan perempuan menjadi satu array
        return response()->json([
            [
                'name' => 'male',
                'data' => $maleData,
            ],
            [
                'name' => 'female',
                'data' => $femaleData,
            ],
        ]);
    }
    public function datakendaraan($year)
    {
        // Inisialisasi array untuk menyimpan jumlah pengguna
        $kendaraan = array_fill(0, 12, 0);

        // Ambil data kendaraan
        $kendaraanuser = Kendaraan::select(DB::raw('COUNT(*) as kendaraan, MONTH(created_at) as month'))
            ->whereYear('created_at', $year) // Ambil hanya data dari tahun yang diberikan
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Masukkan jumlah kendaraan ke dalam array sesuai dengan bulan
        foreach ($kendaraanuser as $item) {
            $kendaraan[$item->month - 1] = $item->kendaraan; // Menggunakan $item->kendaraan
        }
        // Gabungkan data laki-laki dan perempuan menjadi satu array
        return response()->json([
            [
                'name' => 'Jumlah Kendaraan',
                'data' => $kendaraan,
            ],
        ]);
    }
    public function datapool($year)
    {
        // Inisialisasi array untuk menyimpan jumlah pengguna
        $pool = array_fill(0, 12, 0);

        // Ambil data pool
        $pooluser = Kendaraan::select(DB::raw('COUNT(*) as pool, MONTH(created_at) as month'))
            ->where('persetujuan', 1)
            ->where('pool_id', auth()->id())
            ->whereYear('created_at', $year) // Ambil hanya data dari tahun yang diberikan
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Masukkan jumlah pool ke dalam array sesuai dengan bulan
        foreach ($pooluser as $item) {
            $pool[$item->month - 1] = $item->pool; // Menggunakan $item->pool
        }

        // Gabungkan data laki-laki dan perempuan menjadi satu array
        return response()->json([
            [
                'name' => 'Jumlah pool',
                'data' => $pool,
            ],
        ]);
    }

}
