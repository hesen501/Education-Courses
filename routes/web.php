<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

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

Route::group(['middleware'=>'isLogin'],function () {
    Route::get('/admin/login',[AuthController::class, 'index'])->name('login');
    Route::post('/admin/login-submit',[AuthController::class, 'login'])->name('login.submit');
});
