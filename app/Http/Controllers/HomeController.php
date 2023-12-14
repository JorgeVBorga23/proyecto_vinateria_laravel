<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    $viewData = [];
    $viewData["title"] = "Home Page - Vinateria Ricardo Reyes";
    return view('home.index')->with("viewData", $viewData);
    }
    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Informacion de -  Vinateria Ricardo Reyes";
        $viewData["subtitle"] = "Mi información";
        $viewData["description"] = "Esta es una pagina de información";
        $viewData["author"] = "Developed by: Your Name";
        return view('home.about')->with("viewData", $viewData);
    }
}
