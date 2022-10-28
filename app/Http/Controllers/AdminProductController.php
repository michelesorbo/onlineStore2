<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData['title'] = "Prodotti in Admin";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with('viewData', $viewData);//Pagina prenente nella cartella view
    }

    public function store(Request $request){

        //Faccio la validazione dei campi
        Product::validate($request);

        $newProduct = new Product();//INSERT INTO Products
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage("game.png"); //Vado a inserire l'immagine standard
        $newProduct->save(); //Salva i dati nella tabella del DB

        //Se ho selezionato una foto da inserire
        if($request->hasFile('image')){
            $imagaName = $newProduct->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imagaName,
                file_get_contents($request->file('image')->getRealPath()) //Copiare il file dalla sorgente al server
            );

            $newProduct->setImage($imagaName);
            $newProduct->save();
        }

        return back(); //Ritorno alla pagina precedente

    }

    public function delete($id){
        Product::destroy($id);
        return back();
    }

    //Tutte le funzioni per fare Edit di un prodotto
    //Richiamare la pagian edit del prodotto
    public function edit($id){
        $viewData = [];
        $viewData['title'] = "Edit del prodotto";
        $viewData['product'] = Product::findOrFail($id);
        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id){

        //Faccio la validazione dei campi
        Product::validate($request);

        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        //Il campo immagine se non viene modificato non lo sotituisco

        //Se ho selezionato una foto da inserire
        if($request->hasFile('image')){
            $imagaName = $product->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imagaName,
                file_get_contents($request->file('image')->getRealPath()) //Copiare il file dalla sorgente al server
            );

            $product->setImage($imagaName);
        }

        $product->save();
        return redirect()->route('admin.products.index');



    }
}
