<?php

use App\Http\Controllers\Admin\AgeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;

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

Route::group(['middleware'=>'notLogin'],function() {
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::patch('/courses/{id}/edit-1',[CourseController::class, 'editStepOne'])->name('courses.editStepOne');
    Route::patch('/courses/{id}/edit-2',[CourseController::class, 'editStepTwo'])->name('courses.editStepTwo');
    Route::patch('/courses/{id}/edit-3',[CourseController::class, 'editStepThree'])->name('courses.editStepThree');
    Route::patch('/courses/{id}/edit-4',[CourseController::class, 'editStepFour'])->name('courses.editStepFour');

    Route::resources([
        'courses'=> CourseController::class,
        'languages'=> LanguageController::class,
        'categories'=> CategoryController::class,
        'ages'=> AgeController::class,
        'currencies'=> CurrencyController::class,
    ]);
});
