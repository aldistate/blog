<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Aldi Putra Nawasta",
        "email" => "aldistate@yahoo.com",
        "profesi" => "Back-End Developer"
    ]);
});

Route::get('/blog', [PostController::class, "index"]);

// halaman single post
Route::get('/posts/{post:slug}', [PostController::class, "show"]);

// halaman list category
Route::get('/categories', [CategoryController::class, "index"]);

// halaman category
Route::get('/categories/{category:slug}', [CategoryController::class, "show"]);

// halaman list users
Route::get('/users', [UserController::class, 'index']);

// halaman user
Route::get('/users/{user:slug}', [UserController::class, "show"]);

// halaman login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

// mengirim data login
Route::post('/login', [LoginController::class, 'authenticate']);

// mengirim data logout
Route::post('/logout', [LoginController::class, 'logout']);

// halaman register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// mengirim data register
Route::post('/register', [RegisterController::class, 'store']);

// halaman dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');