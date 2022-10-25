<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

//Pagine per la home
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');

//Pagine per i prodotti
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

//Pagine per area ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index'); //Chiamata alla funzione che restituisce un pagina con i dati
Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
Route::post('admin/product/store', [AdminProductController::class, 'store'])->name('admin.product.store');

//Non usare questo metodo
Route::get('/michele', function(){
    return view('home.michele');
});
