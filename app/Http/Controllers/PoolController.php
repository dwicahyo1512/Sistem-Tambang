<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create pool', ['only' => ['create', 'store']]);
        $this->middleware('can:read pool', ['only' => ['show', 'index']]);
        $this->middleware('can:update pool', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete pool', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kendaraans = Kendaraan::where('persetujuan', '=', 0)->paginate(10);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
