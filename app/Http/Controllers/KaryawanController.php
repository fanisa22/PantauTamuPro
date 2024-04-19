<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::orderBy('created_at', 'desc')->get();
        return view('view.karyawan', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $karyawans = Karyawan::orderBy('created_at', 'desc')->get();
        $validatedData = $request->validate([
            'nipd' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
        ]);

        Karyawan::create($validatedData);

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
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

    public function cetakKaryawan(){
        $dataCetakKaryawan = Karyawan::all();
        return view ('rekap.cetak-karyawan', compact('dataCetakKaryawan'));
    }
}
