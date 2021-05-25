<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', \App\Http\Livewire\index::class)->name('index');
Route::get('/home', \App\Http\Livewire\comments::class)->name('home')->middleware('auth');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', \App\Http\Livewire\login::class)->name('login');
    Route::get('/register', \App\Http\Livewire\register::class)->name('register');
});


