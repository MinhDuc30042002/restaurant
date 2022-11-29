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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/categories', function(){
        return 'Page categories';
    })->name('categories');
    Route::get('/dashboard/users', function(){
        return 'Page users';
    })->name('users');
    Route::get('/dashboard/services', function(){
        return 'Page services';
    })->name('services');
    Route::get('/dashboard/foods', function(){
        return 'Page foods';
    })->name('foods');
});
