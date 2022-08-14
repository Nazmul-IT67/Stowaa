<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});
require __DIR__.'/auth.php';
/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::get('dashboard', [DashboardController::class, 'Dashboard'])->name('Dashboard');
/*
| Dashboard Routes
*/
Route::get('category', [CategoryController::class, 'Category'])->name('Category');
Route::POST('category-post', [CategoryController::class, 'CategoryPost'])->name('CategoryPost');
