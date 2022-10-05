<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('login',[
           'page_title' => 'Login'
        ]);
        
    }

    public function prosesLogin(Request $request){
        // if(Auth::attempt($request->only('email','password'))){
        // return redirect('/');
        // }
        // return redirect('/login');
        $data = $request->validate([
        'email' => ['required'],
        'password' => ['required']
        ]);

        if (Auth::attempt($data)) {
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
    return back()->with('Error', 'Email atau Password salah.');

    }

    public function logout(){
        Auth::logout();
        return redirect ('/login');
    }

    public function registrasi(){
        return view('registrasi');
    }
    
    public function simpanRegistrasi(Request $request){
       User::create([
       'name' => $request->name,
       'email' => $request->email,
       'password' => bcrypt($request->password),
       'remember_token' => Str::random(60),
       ]);
       
        return redirect('registrasi')->with('success', 'Registrasi Berhasil.');
    }
}