<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{
    public function index()
    {
        $category = Categoria::paginate();

        return response(['status' => true, 'data' => $category], Response::HTTP_OK);
    }
 
    public function show($id)
    {
        $category = Categoria::find($id);
        if ($category != null) {
            return response()->json(['status' => true, 'data' => $category], Response::HTTP_OK);
        } else {
            return response()->json(['status' => false, 'data' => null], Response::HTTP_NOT_FOUND);
        }
    }
 
    public function store(StoreProductoRequest $request)
    {
        $category = new Categoria($request->input());

        $category->saveOrFail();

        return response()->json(['status' => true, 'data' => $category], Response::HTTP_OK);
    }
 
    public function update(UpdateProductoRequest $request, $id)
    {
        $category = Categoria::findOrFail($id);
        $category->fill($request->input())->saveOrFail();
        return response()->json(['status' => true, 'data' => $category], 200);
    }
 
    public function destroy($id)
    {
        $category = Categoria::findOrFail($id);
        $category->delete();
        return response()->json(['estado' => true, 'mensajes' => 'Eliminado el '.$id], 200);
    }
}
