<?php

use App\Http\Controllers\customAuthController;
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
    return view('welcome');
});

Route::get('login', [customAuthController::class, 'login'])->middleware('loggedin');
Route::get('registration', [customAuthController::class, 'registration'])->middleware('loggedin');
Route::post('register-user', [customAuthController::class, 'registerUser'])->name('register-user');
Route::post('login-user', [customAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard',[customAuthController::class, 'dashboard'])->middleware('checkAuth');
Route::get('/logout',[customAuthController::class, 'logout']);
