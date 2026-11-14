<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function form(){
        return view('auth.register');
    }
    public function registration(Request $request){
        $dataMhs = $request -> validate([
        'nim_nip'        => 'required|string|unique:users,nim_nip|max:50',
        'name'           => 'required|string|max:255',
        'email'          => 'required|string|email|unique:users,email|max:255',
        'password'       => 'required|string|min:8|confirmed', 
        'no_wa'          => 'required|numeric|digits_between:10,15',
        'kelas_jurusan'  => 'required|string|max:100',
        'role'           => 'required|in:mahasiswa,aslab',
        ]);
        User::create($dataMhs);
        return redirect('/login')->with('success','Registrasi anda Sukses');
    }
}
