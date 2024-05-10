<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Exports\KendaraanExport;
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kendaraans = Kendaraan::where('status', '=', 1)->paginate(10);
        return view('kendaraan.index', compact('kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $date = Carbon::createFromFormat('d M, Y', $request->jadwal_service)->format('Y-m-d');
        try {
            $request->validate([
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

            $dt = now();
            $imagePath = $request->file('img_kendaraan')->store('img_kendaraan', 'public');

            $imageUrl = Storage::url($imagePath);

            $kendaraan = Kendaraan::create([
                'nama' => $request->name,
                'img' => $imageUrl, // Menggunakan $imageUrl
                'type' => $request->type,
                'bahan_bakar' => $request->bahan_bakar,
                'konsumsi_bbm' => $request->konsumsi_bbm,
                'jadwal_service' => $date,
                'keterangan' => $request->keterangan,
                'status' => 1,
                'persetujuan' => 0,
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
        //
        return view('kendaraan.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        //
        // dd($request->all());
        $date = Carbon::createFromFormat('d M, Y', $request->jadwal_service)->format('Y-m-d');
        try {
            $request->validate([
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

            $kendaraanData = [
                'nama' => $request->name,
                'type' => $request->type,
                'bahan_bakar' => $request->bahan_bakar,
                'konsumsi_bbm' => $request->konsumsi_bbm,
                'jadwal_service' => $date,
                'keterangan' => $request->keterangan,
                'status' => 1,
            ];

            if ($request->hasFile('img_kendaraan')) {
                $imagePath = $request->file('img_kendaraan')->store('img_kendaraan', 'public');
                $imageUrl = Storage::url($imagePath);
                $kendaraanData['img'] = $imageUrl;
            }

            $kendaraan->update($kendaraanData);

            return redirect()->route('kendaraans.index')->with('success', 'Kendaraan successfully created');
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
        $kendaraan->delete();
        Toastr::success('Berhasil menghapus kendaraan', 'Success'); // Menggunakan metode success untuk Toastr
        return redirect()->route('kendaraans.index');
    }

    public function setuju(Request $request, Kendaraan $kendaraan)
    {
        //
        $kendaraanData = [
            'persetujuan' => 1,
        ];
        $kendaraan->update($kendaraanData);
        Toastr::success('Berhasil Menyetujui Member Berkendara', 'Success'); // Menggunakan metode success untuk Toastr
        return redirect()->route('kendaraans.index');
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
