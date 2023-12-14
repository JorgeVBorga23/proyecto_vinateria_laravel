<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Licor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Ventas;
use Illuminate\Support\Facades\Storage;

class AdminVentaController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Página Administrador - Venta - Vinateria Ricardo Reyes";
        $viewData["venta"] = Ventas::all();
        $viewData["licores"] = Licor::all();
        $viewData["usuarios"] = User::all();
        return view('admin.ventas.index')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        Ventas::validate($request);
        $newProduct = new Ventas();
        $newProduct->setIdLicor($request->input('licor_id'));
        $newProduct->setIdUser($request->input('user_id'));
        
        $newProduct->save();
    
        return back();
    }
    public function delete($id)
    {
        Ventas::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Pagina Adminstrador - Edit Ventas - Vinateria Ricardo Reyes";
        $viewData["venta"] = Ventas::findOrFail($id);
        $viewData["licores"] = Licor::all();
        $viewData["usuarios"] = User::all();
        return view('admin.ventas.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        Ventas::validate($request);
        $category = Ventas::findOrFail($id);
        $category->setIdLicor($request->input('licor_id'));
        $category->setIdUser($request->input('user_id'));
        $category->save();
        return redirect()->route('admin.venta.index');
    }
}
