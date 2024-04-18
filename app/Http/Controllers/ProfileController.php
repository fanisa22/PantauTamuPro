<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $profiles = Profile::all();
            return view ('view.profile', compact('profiles'));
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        Profile::create($validatedData);

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
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'tanggal_lahir' => 'required|date',
        ]);

        try {
            $profile = Profile::findOrFail($id);
            $profile->nama = $request->input('nama');
            $profile->username = $request->input('username');
            $profile->email = $request->input('email');
            $profile->alamat = $request->input('alamat');
            $profile->no_hp = $request->input('no_hp');
            $profile->tanggal_lahir = $request->input('tanggal_lahir');
            $profile->save();
            return redirect()->route('profile.index')->with('success', 'Data pengguna berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data pengguna. Silakan coba lagi.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'Profil berhasil dihapus!');
    }

    public function cetakProfil(){
        $dataCetakTamu = Visitor::all();
        return view ('rekap.cetak-profil', compact('dataCetakprofil'));
    }
}
