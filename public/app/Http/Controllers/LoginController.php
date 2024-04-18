<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{

    // public function login(Request $request)
    // {
    //     if ($request->getMethod() === 'GET') {
    //         return view('auth.login');
    //     }

    //     $credentials = $request->only('email', 'password');

    //     $user = User::where('email', $credentials['email'])->first();

    //     if (!$user) {
    //         $request->session()->flash('error', 'email tdk ada di db');
    //         return redirect()->back()->withInput();
    //     }

    //     if (!Hash::check($credentials['password'], $user->password)) {
    //         return response()->json(['message' => 'Password salah!'], 200);
    //     }        

    //     if (Auth::attempt($credentials)) {
    //         return redirect(route('dashboard'));
    //     } 

    //     if (!Auth::attempt($credentials)) {
    //         return response()->json(['message' => 'Gagal Login!'], 200);
    //     }
    // }

    public function index(){
        return view ('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            // Jika otentikasi berhasil
            return redirect()->intended('/dashboard'); // Redirect ke halaman dashboard
        } else {
            // Jika otentikasi gagal
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
