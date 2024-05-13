<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Exports\KendaraanExport;
use App\Models\RiwayatKendaraan;
use App\Models\User;
use App\Models\UserKendaraan;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Maatwebsite\Excel\Facades\Excel;

class KendaraanController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create admin', ['only' => ['create', 'store']]);
        $this->middleware('can:read admin', ['only' => ['show', 'index']]);
        $this->middleware('can:update admin', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete admin', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $identitas = 'kendaraan';
        $pool = User::role('pool')->get();
        $client = User::role('client-users')->whereNotIn('id', function ($query) {
            $query->select('user_id')
            ->from('user_kendaraans');
        })->get();
        $gendermaledate = User::where('gender', 'male')->get();
        $kendaraans = Kendaraan::paginate(10);
        return view('kendaraan.index', compact('kendaraans', 'identitas', 'pool', 'client'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function riwayat($id)
    {
        //
        $kendaraans = RiwayatKendaraan::where('kendaraan_id', $id)->paginate(10);
        return view('kendaraan.riwayat', compact('kendaraans'));
        // dd($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());

        try {
            $request->validate([
                'client' => ['required'],
                'pool' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                'type' => ['required', 'string', 'max:255'],
                'keterangan' => ['required', 'string', 'max:555'],
                'bahan_bakar' => ['required', 'string', 'max:255'],
                'konsumsi_bbm' => ['required', 'numeric', 'min:0'],
                'jadwal_service' => ['required'],
                'img_kendaraan' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // max 2MB
            ], [
                'img_kendaraan.required' => 'Please upload your Profile image.',
                'img_kendaraan.image' => 'The uploaded file must be an image.',
                'img_kendaraan.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
                'img_kendaraan.max' => 'The image may not be greater than :max kilobytes.',
            ]);
            $date = Carbon::createFromFormat('d M, Y', $request->jadwal_service)->format('Y-m-d');
            $dt = now();
            $imagePath = $request->file('img_kendaraan')->store('img_kendaraan', 'public');

            $imageUrl = Storage::url($imagePath);

            $client = explode('-', $request->client);
            $clientid = $client[0];
            $clientname = $client[1];
            $valuepool = explode('-', $request->pool);
            $poolid = $valuepool[0];
            $poolname = $valuepool[1];

            $kendaraan = Kendaraan::create([
                'kendaraan_user_id' => $clientid,
                'pool_id' => $poolid,
                'nama' => $request->name,
                'img' => $imageUrl, // Menggunakan $imageUrl
                'type' => $request->type,
                'bahan_bakar' => $request->bahan_bakar,
                'konsumsi_bbm' => $request->konsumsi_bbm,
                'jadwal_service' => $date,
                'keterangan' => $request->keterangan,
                'status' => 2,
                'persetujuan' => 0,
            ]);

            $kendaraanId = $kendaraan->id;

          

            // $userkendaraan = UserKendaraan::create([
            //     'user_id' => $clientid,
            //     'kendaraan_id' => $kendaraanId,
            //     'pool_id' => $poolid,
            // ]);

            $riwayatkendaraan = RiwayatKendaraan::create([
                'kendaraan_id' => $kendaraan->id,
                'nama_driver' => $clientname,
                'nama_kendaraan' => $request->name,
                'nama_pool' => $poolname,
                'type' => $request->type,
                'bahan_bakar' => $request->bahan_bakar,
                'konsumsi_bbm' => $request->konsumsi_bbm,
                'jadwal_service' => $date,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->back()->with('success', 'Kendaraan successfully created');
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->all();
            Toastr::error(implode('<br>', $errors), 'Error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        $pool = User::role('pool')->get();
        $client = User::role('client-users')->get();
        $kendaraan = Kendaraan::where('id', $kendaraan->id)->first();
        return view('kendaraan.edit', compact('kendaraan', 'pool', 'client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        //


        try {
            $request->validate([
                'client' => ['required'],
                'pool' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                'type' => ['required', 'string', 'max:255'],
                'keterangan' => ['required', 'string', 'max:555'],
                'bahan_bakar' => ['required', 'string', 'max:255'],
                'konsumsi_bbm' => ['required', 'numeric', 'min:0'],
                'jadwal_service' => ['required'],
                'img_kendaraan' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // max 2MB
            ], [
                'img_kendaraan.image' => 'The uploaded file must be an image.',
                'img_kendaraan.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
                'img_kendaraan.max' => 'The image may not be greater than :max kilobytes.',
            ]);
            $date = Carbon::createFromFormat('d M, Y', $request->jadwal_service)->format('Y-m-d');

            $client = explode('-', $request->client);
            $clientid = $client[0];
            $clientname = $client[1];

            $valuepool = explode('-', $request->pool);
            $poolid = $valuepool[0];
            $poolname = $valuepool[1];

            $kendaraanData = [
                'kendaraan_user_id' => $clientid,
                'kpool_id' => $poolid,
                'nama' => $request->name,
                'type' => $request->type,
                'bahan_bakar' => $request->bahan_bakar,
                'konsumsi_bbm' => $request->konsumsi_bbm,
                'jadwal_service' => $date,
                'keterangan' => $request->keterangan,
                'status' => 2,
            ];

            if ($request->hasFile('img_kendaraan')) {
                $imagePath = $request->file('img_kendaraan')->store('img_kendaraan', 'public');
                $imageUrl = Storage::url($imagePath);
                $kendaraanData['img'] = $imageUrl;
            }

            $kendaraan->update($kendaraanData);

            // $userKendaraan = UserKendaraan::find($kendaraan->id);

            // $userKendaraan->update([
            //     'user_id' => $clientid,
            //     'pool_id' => $poolid,
            // ]);


            // 

            if ($request->check == 1) {
                RiwayatKendaraan::create([
                    'kendaraan_id' => $kendaraan->id,
                    'nama_driver' => $clientname,
                    'nama_kendaraan' => $request->name,
                    'nama_pool' => $poolname,
                    'type' => $request->type,
                    'bahan_bakar' => $request->bahan_bakar,
                    'konsumsi_bbm' => $request->konsumsi_bbm,
                    'jadwal_service' => $date,
                    'keterangan' => $request->keterangan,
                ]);
            }
            // dd($clientid);
            return redirect()->route('kendaraans.index')->with('success', 'Kendaraan successfully Updated');
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->all();
            Toastr::error(implode('<br>', $errors), 'Error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan)
    {
        // Hapus relasi dari tabel UserKendaraan yang memiliki kendaraan_id sama dengan id kendaraan yang dihapus
        // UserKendaraan::where('kendaraan_id', $kendaraan->id)->delete();

        // Hapus kendaraan dari tabel Kendaraan
        $kendaraan->delete();

        Toastr::success('Berhasil menghapus kendaraan', 'Success'); // Menampilkan pesan sukses menggunakan Toastr
        return redirect()->route('kendaraans.index');
    }


    public function setuju(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        if ($kendaraan->persetujuan == 1) {
            Toastr::error('Kendaraan telah disetujui sebelumnya.', 'Error');
            return redirect()->route('pools.index');
        }

        $request->validate([
            'persetujuan' => 'required',
        ]);
        $kendaraan->update(['persetujuan' => $request->persetujuan]);
        Toastr::success('Berhasil Menyetujui Member Berkendara', 'Success');

        return redirect()->route('pools.index');
    }

    public function check(Request $request, Kendaraan $kendaraan)
    {
        //
        $kendaraanData = [
            'status' => 2,
        ];
        $kendaraan->update($kendaraanData);
        Toastr::success('Berhasil Memilih kendaraan. Tunggu Konfirmasi dari pool', 'Success', ["timeOut" => 10000]); // Menggunakan metode success untuk Toastr
        return redirect()->route('kendaraans.index');
    }
}
