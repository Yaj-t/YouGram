<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin-users', function () {
    return view('users-admin');
});
Route::get('/users-admin', [ProfileController::class, 'index'])->name('users-admin');

Route::put('/users/{user}', [ProfileController::class, 'update'])->name('users.update');
Route::post('/videos/insert/{user}', [VideoController::class, 'insert'])->name('videos.insert');
Route::resource('videos', VideoController::class);
