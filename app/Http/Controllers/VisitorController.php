<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TamuExport;
use App\Exports\UsersExport;

class VisitorController extends Controller
{
    public function cetakTamu(){
        $dataCetakTamu = Visitor::all();
        return view ('rekap.cetak-tamu', compact('dataCetakTamu'));
    }

    public function cetakVip(){
        $dataCetakTamu = Visitor::all();
        return view ('rekap.cetak-vip', compact('dataCetakvip'));
    }

    public function cetakProfil(){
        $dataCetakTamu = Visitor::all();
        return view ('rekap.cetak-profil', compact('dataCetakprofil'));
    }

    public function cetakKaryawan(){
        $dataCetakTamu = Visitor::all();
        return view ('rekap.cetak-karyawan', compact('dataCetakkaryawan'));
    }

    public function xlsx()
    {
        // return Excel::download(new TamuExport, 'users.xlsx');
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
