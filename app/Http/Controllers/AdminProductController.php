<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData['title'] = "Prodotti in Admin";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function store(Request $request){

        //Faccio la validazione dei campi
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            'image' => 'image',
        ]);

        $newProduct = new Product();//INSERT INTO Products
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage("game.png");
        $newProduct->save(); //Salva i dati nella tabella del DB

        return back(); //Ritorno alla pagina precedente
    }
}
