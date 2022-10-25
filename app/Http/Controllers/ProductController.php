<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Simulo i prodotti dal DB
    // public static $products = [
    //     ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "image" => "game.png", "price"=>"1000"],
    //     ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "image" => "safe.png", "price"=>"999"],
    //     ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "image" => "submarine.png", "price"=>"30"],
    //     ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "image" => "game.png", "price"=>"100"]
    // ];

    public function index(){ //Pagina index dei prodotti
        $viewData = [];
        $viewData['title'] = "Prodotti";
        $viewData['subtitle'] = "Lista Prodotti";
        $viewData['prodotti'] = Product::all();
        return view('product.index')->with('viewData', $viewData);
    }

    public function show($id){
        $viewData = [];
        $product = Product::findOrFail($id); //Select del prodotto con id = all'id passato
        $viewData['title'] = $product->getName();
        $viewData['subtitle'] = $product->getName();
        $viewData['product'] = $product;
        return view('product.show')->with('viewData', $viewData);
    }
}
