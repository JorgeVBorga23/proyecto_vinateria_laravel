<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Licor;
use Illuminate\Support\Facades\Storage;


class AdminLicorController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Página Administrador - Licores - Vinateria Ricardo Reyes";
        $viewData["licor"] = Licor::all();
        $viewData["categorias"] = Categoria::all();
        return view('admin.licor.index')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        Licor::validate($request);
        $newProduct = new Licor();
        $newProduct->setName($request->input('name'));
        $newProduct->setPrecio($request->input('precio'));
        $newProduct->setDescripcion($request->input('descripcion'));
        $newProduct->setCategoriaId($request->input('categoria_id'));
        $newProduct->setImagen("ruby.jpeg");
        $newProduct->save();
        if ($request->hasFile('imagen')) {
            $imageName = $newProduct->getId().".".$request->file('imagen')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('imagen')->getRealPath())
            );
            $newProduct->setImagen($imageName);
            $newProduct->save();
        }
            
        return back();
    }
    public function delete($id)
    {
        Licor::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Pagina Administrador - Edit Licores - Vinateria Ricardo";
        $viewData["licor"] = Licor::findOrFail($id);
        $viewData["categorias"] = Categoria::all();
        return view('admin.licor.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        Licor::validate($request);
        $book = Licor::findOrFail($id);
        $book->setName($request->input('name'));
        $book->setPrecio($request->input('precio'));
        $book->setDescripcion($request->input('descripcion'));
        $book->setCategoriaId($request->input('categoria_id'));
        if ($request->hasFile('imagen')) {
            $imageName = $book->getId().".".$request->file('imagen')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('imagen')->getRealPath())
            );
            $book->setImagen($imageName);
        }
        $book->save();
        return redirect()->route('admin.licor.index');
    }
}
