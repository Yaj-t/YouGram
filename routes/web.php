<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
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

Route::redirect('/home', 'videos')->name('home');

// routes/web.php

Route::get('/admin-users', [UserController::class, 'adminIndex'])->name('admin.user');

Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users-admin', [ProfileController::class, 'index'])->name('users-admin')->middleware('auth');
Route::put('/users/{user}', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{user}', [UserController::class, 'adminUpdate'])->name('users.adminUpdate');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/user/{user}', [UserController::class, 'show'])->name('user.profile')->middleware('auth');;
Route::get('/user/{user}/subscriptions', [UserController::class, 'subscriptions'])->name('user.subscriptions')->middleware('auth');
Route::get('/user/{user}/subscribers', [UserController::class, 'subscribers'])->name('user.subscribers')->middleware('auth');

Route::get('/videos', [VideoController::class, 'index'])->name('videos.index')->middleware('auth');
Route::get('/videos-admin', [VideoController::class, 'adminIndex'])->name('videos.admin-index')->middleware('auth');
Route::get('/videos/tag/{tag}', [VideoController::class, 'videosWithTag'])->name('videos.tag')->middleware('auth');
Route::get('/videos-user/{user}', [VideoController::class, 'userVideos'])->name('videos-user')->middleware('auth');
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create')->middleware('auth');
Route::post('/videos', [VideoController::class, 'store'])->name('videos.store')->middleware('auth');
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show')->middleware('auth');
Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit')->middleware('auth');
Route::put('/videos/{video}', [VideoController::class, 'update'])->name('videos.update')->middleware('auth');
Route::delete('/videos/{video}', [VideoController::class, 'destroy'])->name('videos.destroy')->middleware('auth');


Route::get('/search', [VideoController::class, 'search'])->name('videos.search');
Route::get('/trending', [VideoController::class, 'trending'])->name('videos.trending');


Route::post('/subscribe/{user}', [SubscriptionController::class, 'subscribe'])->name('subscribe')->middleware('auth');
// Route::post('/unsubscribe/{user}', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe')->middleware('auth');
Route::delete('/unsubscribe/{user}', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe')->middleware('auth');


Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::post('/like/{video}', [LikeController::class, 'like'])->name('like');
    Route::post('/unlike/{video}', [LikeController::class, 'unlike'])->name('unlike');
});
