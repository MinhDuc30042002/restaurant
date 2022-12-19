<?php

use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\FoodController as ClientFoodController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\FoodController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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
    'staff',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        Route::resource('categories', CategoriesController::class);
        Route::resource('food', FoodController::class);
    });

    Route::get('/dashboard/employees', [App\Http\Controllers\Dashboard\EmployeeController::class, 'index'])->name('employees');
    Route::resource('/dashboard/groups', App\Http\Controllers\Dashboard\GroupController::class);
    Route::get('/dashboard/services', function () {
        return 'Page services';
    })->name('services');
    Route::get('/dashboard/foods', function () {
        return 'Page foods';
    })->name('foods');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/mon-an/{slug}', [ClientFoodController::class, 'index']);
Route::resource('the-loai', CategoryController::class);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/checkout', [CheckoutController::class, 'index']);

Route::prefix('login')->group(function () {
    // Google Login
    Route::get('/google', [AuthenticatedSessionController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/google/callback', [AuthenticatedSessionController::class, 'handleGoogleCallback']);
});

Route::prefix('setting')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('setting.profile');
    Route::get('/orders', [ProfileController::class, 'orders'])->name('setting.orders');
    Route::get('/order/{id}', [ProfileController::class, 'orderDetail']);
});
