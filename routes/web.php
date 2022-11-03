<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Pagine per area ADMIN protette dal Middleware
Route::middleware('admin')->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index'); //Chiamata alla funzione che restituisce un pagina con i dati
    //Pagine Prodotti ADMIN
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::post('/admin/product/store', [AdminProductController::class, 'store'])->name('admin.product.store');
    Route::delete('/admin/products/{id}/delete', [AdminProductController::class, 'delete'])->name("admin.product.delete");
    Route::get('/admin/product/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/admin/product/{id}/update', [AdminProductController::class, 'update'])->name('admin.product.update');
    //Pagine BLOG admin
    Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
    Route::post('/admin/blog/store', [AdminBlogController::class, 'store'])->name('admin.blog.store');
    Route::delete('/admin/blog/{id}/delete', [AdminBlogController::class, 'delete'])->name('admin.blog.delete');
    Route::get('/admin/edit/{id}/edit', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/admin/blog/{id}/update', [AdminBlogController::class, 'update'])->name('admin.blog.update');
});

//Non usare questo metodo
Route::get('/michele', function(){
    return view('home.michele');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
