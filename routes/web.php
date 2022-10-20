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

Route::get('/', function () {
    $viewData = [];
    $viewData['title'] = "Home di Online Shop";
    return view('home.index')->with("viewData", $viewData);
});

Route::get('/michele', function(){
    return view('home.michele');
});
