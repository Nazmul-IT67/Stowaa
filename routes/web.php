<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FrontendController;


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
|                Fontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/',[FrontendController::class, 'Fontend'])->name('Fontend');
Route::get('single-product/{slug}',[FrontendController::class, 'SingleProduct'])->name('SingleProduct');
Route::get('product-page',[FrontendController::class, 'ProductPage'])->name('ProductPage');
// Route::get('get-attribute/{id}',[FrontendController::class, 'GetAttribute'])->name('GetAttribute');
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
/*
|--------------------------------------------------------------------------
|                Product Attribute
|--------------------------------------------------------------------------
*/
Route::get('add-brand',[BrandsController::class, 'Brand'])->name('Brand');
Route::POST('brand-post',[BrandsController::class, 'BrandPost'])->name('BrandPost');
Route::get('add-color',[ColorsController::class, 'Color'])->name('Color');
Route::POST('color-post',[ColorsController::class, 'ColorPost'])->name('ColorPost');
Route::get('add-size',[SizeController::class, 'Size'])->name('Size');
Route::POST('size-post',[SizeController::class, 'SizePost'])->name('SizePost');
/*
|--------------------------------------------------------------------------
|                Product Routes
|--------------------------------------------------------------------------
*/
Route::get('add-product',[ProductsController::class, 'AddProduct'])->name('AddProduct');
Route::POST('product-post',[ProductsController::class, 'ProductPost'])->name('ProductPost');
Route::get('all-product',[ProductsController::class, 'ProductList'])->name('ProductList');
Route::get('trash-product',[ProductsController::class, 'TrashProduct'])->name('TrashProduct');
Route::get('sub-cat/{id}', [ProductsController::class, 'SubCat'])->name('SubCat');
Route::get('product-list', [ProductsController::class, 'ProductList'])->name('ProductList');
Route::get('ststus/{id}', [ProductsController::class, 'ChangeStatus'])->name('ChangeStatus');
/*
|--------------------------------------------------------------------------
|                Product Cart Routes
|--------------------------------------------------------------------------
*/
Route::get('cart-page',[CartController::class, 'CartPage'])->name('CartPage');
Route::get('single/cart/{slug}',[CartController::class,'SingleCart'])->name('SingleCart');
Route::get('cart-product',[CartController::class, 'CartProduct'])->name('CartProduct');
Route::get('cart-update',[CartController::class, 'CartUpdate'])->name('CartUpdate');
