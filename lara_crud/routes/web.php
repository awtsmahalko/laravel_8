<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
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
    return view('welcome');
});


Route::get('/login', [UserAuthController::class,'login'])->name('login')->middleware('AlreadyLoggedIn');
Route::get('/register', [UserAuthController::class,'register'])->middleware('AlreadyLoggedIn');
Route::post('/createUser', [UserAuthController::class,'createUser'])->name('auth.create');
Route::post('/checkUser', [UserAuthController::class,'checkUser'])->name('auth.check');


Route::get('/profile', [UserAuthController::class,'userProfile'])->name('profile')->middleware('isLogged');
Route::get('/logout', [UserAuthController::class,'logout'])->name('logout');