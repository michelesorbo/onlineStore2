<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData['title'] = "Admin Page";
        return view('admin.index')->with('viewData', $viewData);
    }
}
