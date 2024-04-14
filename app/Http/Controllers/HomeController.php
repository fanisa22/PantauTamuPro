<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;

class HomeController extends Controller
{
    public function index(){
        return view ('index');
    }

    public function dashboard(){
        return view ('view.dashboard');
    }

    public function element(){
        $visitors = Visitor::all();
        return view ('view.elements', compact('visitors'));
    }

    public function vip(){
        $visitors = Visitor::all();
        return view ('view.vip', compact('visitors'));
    }

    public function karyawan(){
        $visitors = Visitor::all();
        return view ('view.karyawan', compact('visitors'));
    }

    public function profile(){
        $visitors = Visitor::all();
        return view ('view.profile', compact('visitors'));
    }

    public function daftar(){
        $visitors = Visitor::all();
        return view ('view.daftar', compact('visitors'));
    }

    public function feedback(){
        $visitors = Visitor::all();
        return view ('view.feedback', compact('visitors'));
    }

    public function tabler(){
        return view ('view.tables');
    }

}
