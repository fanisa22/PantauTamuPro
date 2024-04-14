<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function cetakTamu(){
        $dataCetakTamu = Visitor::all();
        return view ('view.cetak-tamu', compact('dataCetakTamu'));
    }
}
