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
Route::get('category-list', [CategoryController::class, 'CategoryList'])->name('CategoryList');
Route::get('ststus/{id}', [CategoryController::class, 'ChangeStatus'])->name('ChangeStatus');
Route::get('category-edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('CategoryEdit');
Route::get('category-delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('CategoryDelete');
Route::POST('category-update', [CategoryController::class, 'CategoryUpdate'])->name('CategoryUpdate');
Route::get('cat-trash-list', [CategoryController::class, 'CatTrashList'])->name('CatTrashList');
Route::get('cat-reset/{id}', [CategoryController::class, 'CategoryReset'])->name('CategoryReset');
Route::get('delete-permanently/{id}', [CategoryController::class, 'DelPermanently'])->name('DelPermanently');
