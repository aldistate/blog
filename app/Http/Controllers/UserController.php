<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('users', [
            'title' => 'User',
            'active' => 'user',
            'users' => User::all(),
        ]);
    }

    // public function show(User $user){
    //     return view('posts', [
    //         'title' => "Post By Author: $user->name",
    //         'active' => 'user',
    //         'posts' => $user->posts->load('user', 'category'),
    //     ]);
    // }
}
