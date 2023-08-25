<?php

use App\Http\Controllers\Admin\AgeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SectionController;

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

    Route::get('/courses/{id}/create-section',[SectionController::class, 'create'])->name('sections.create');
    Route::post('/courses/section/store',[SectionController::class, 'store'])->name('sections.store');
    Route::get('/courses/section/{id}/edit',[SectionController::class, 'edit'])->name('sections.edit');
    Route::patch('/courses/section/{id}',[SectionController::class, 'update'])->name('sections.update');
    Route::get('/courses/section/{id}/delete',[SectionController::class, 'destroy'])->name('sections.destroy');

    Route::resources([
        'courses'=> CourseController::class,
        'languages'=> LanguageController::class,
        'categories'=> CategoryController::class,
        'ages'=> AgeController::class,
        'currencies'=> CurrencyController::class,
    ]);
});
