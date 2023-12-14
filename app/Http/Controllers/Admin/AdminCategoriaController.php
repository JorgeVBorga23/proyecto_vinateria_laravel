<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class AdminCategoriaController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Página Administrador - Categoria - Vinateria Ricardo Reyes";
        $viewData["categoria"] = Categoria::all();
        return view('admin.categoria.index')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        Categoria::validate($request);
        $newProduct = new Categoria();
        $newProduct->setName($request->input('name'));
        $newProduct->save();
    
        return back();
    }
    public function delete($id)
    {

        try {
            Categoria::destroy($id);
            return back();
        } catch (\Illuminate\Database\QueryException $e) {
            // Error de la base de datos, puede ser debido a una restricción de clave externa
        
            return redirect()->route('admin.categoria.index');
        }
       
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Pagina Administrador - Edit categoria - Vinateria Ricardo Reyes";
        $viewData["categoria"] = Categoria::findOrFail($id);
        return view('admin.categoria.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        Categoria::validate($request);
        $category = Categoria::findOrFail($id);
        $category->setName($request->input('name'));
        $category->save();
        return redirect()->route('admin.categoria.index');
    }
}
