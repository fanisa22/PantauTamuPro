<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vip;

class VipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vips = Vip::orderBy('created_at', 'desc')->get();
        return view ('view.vip', compact('vips'));
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
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'undangan' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
            'asal_instansi' => 'required',
            'no_hp' => 'required',
            'tanggal' => 'required',
        ]);

        // Simpan data ke database
        Vip::create($validatedData);

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

    public function cetakVip(){
        $dataCetakVip = Vip::all();
        return view ('rekap.cetak-vip', compact('dataCetakVip'));
    }
}
