<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Visibilità function nome della funzione
    public function index(){
        $viewData = []; //Inizializzo l'array a vuoto
        $viewData['title'] = "Home Page - Online Store";
        return view('home.index')->with('viewData',$viewData);
    }

    public function about(){
        $viewData = [];
        $viewData['title'] = "About - Online Store";
        $viewData['subtitle'] = "About Us";
        $viewData['content'] = "Siamo una società di sviluppo software";
        $viewData['autori'] = "Michele e Francesco";
        return view('home.about')->with('viewData', $viewData);
    }
}
