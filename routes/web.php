<?php

use App\Http\Controllers\Dashboard\CategoriesController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        Route::get('categories', [CategoriesController::class, 'index'])->name('categories');
    });

    Route::get('/dashboard/employees', [App\Http\Controllers\Dashboard\EmployeeController::class, 'index'])->name('employees');
    Route::get('/dashboard/services', function () {
        return 'Page services';
    })->name('services');
    Route::get('/dashboard/foods', function () {
        return 'Page foods';
    })->name('foods');
});
