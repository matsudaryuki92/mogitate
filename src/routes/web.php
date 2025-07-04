<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LifeCycleTestController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/register', [ProductController::class, 'create'])->name('create');
    Route::post('/register', [ProductController::class, 'store'])->name('store');
    Route::get('/search', [ProductController::class, 'search'])->name('search');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    Route::put('/{product}/update', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}/delete', [ProductController::class, 'destroy'])->name('destroy');
});

Route::get('/lifeCycleTest', [LifeCycleTestController::class, 'LifeCycleTest']);