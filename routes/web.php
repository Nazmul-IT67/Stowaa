<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

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
|--------------------------------------------------------------------------
|                    Category Routes
|--------------------------------------------------------------------------
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
/*
|--------------------------------------------------------------------------
|                 SubCategory Routes
|--------------------------------------------------------------------------
*/
Route::get('subcategory', [SubCategoryController::class, 'SubCategory'])->name('SubCategory');
Route::POST('subcategory-post', [SubCategoryController::class, 'SubCategoryPost'])->name('SubCategoryPost');
Route::get('subcategory-list', [SubCategoryController::class, 'SubCategoryList'])->name('SubCategoryList');
Route::get('subcattrash-list', [SubCategoryController::class, 'SubCatTrashList'])->name('SubCatTrashList');
Route::get('ststus/{id}', [SubCategoryController::class, 'ChangeStatus'])->name('ChangeStatus');
Route::get('subcategory-edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('SubCategoryEdit');
Route::POST('subcategory-update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('SubCategoryUpdate');
Route::get('subcategory-delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('SubCategoryDelete');
Route::get('cat-reset/{id}', [SubCategoryController::class, 'SubCategoryReset'])->name('SubCategoryReset');
Route::get('delete-permanently/{id}', [SubCategoryController::class, 'SubCategoryPDelete'])->name('SubCategoryPDelete');
