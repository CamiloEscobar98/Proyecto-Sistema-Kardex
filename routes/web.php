<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminPanel\UserController;
use App\Http\Controllers\AdminPanel\ProductCategoryController;
use App\Http\Controllers\AdminPanel\ProductController;
use App\Http\Controllers\AdminPanel\KardexMovementController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::prefix('admin-panel')->name('admin_panel.')->group(function () {
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

        Route::get('product_categories', [ProductCategoryController::class, 'index'])->name('product_categories.index');
        Route::get('product_categories/create', [ProductCategoryController::class, 'create'])->name('product_categories.create');
        Route::get('product_categories/{product_category}', [ProductCategoryController::class, 'show'])->name('product_categories.show');

        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

        Route::get('kardex_movements', [KardexMovementController::class, 'index'])->name('kardex_movements.index');
        Route::get('kardex_movements/create', [KardexMovementController::class, 'create'])->name('kardex_movements.create');
    });
});
