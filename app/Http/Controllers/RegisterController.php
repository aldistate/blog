<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
      return view('register.index', [
        'title' => 'Register',
        'active' => 'register',
      ]);
    }

    // method validasi data
    public function store(Request $request)
    {
      $validatedData =  $request->validate([
        'name' => [
          'required',
          'max:80',
        ],
        'slug' => [
          'required',
          'max:80',
        ],
        'email' => [
          'required',
          'max:80',
          'email:dns',
          'unique:users'
        ],
        'password' => [
          'required',
          'min:6'
        ],
      ]);

      // meng-enkripsi/hashing password
      $validatedData['password'] = Hash::make($validatedData['password']);

      // mengirim data ke model Users
      User::create($validatedData);

      // redirect ke halaman login
      return redirect('/login')->with('sukses', 'Registrasi Berhasil, Silahkan Login');
    }
}
