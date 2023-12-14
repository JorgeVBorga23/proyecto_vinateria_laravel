<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licor;
use App\Models\Ventas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LicorController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Vinateria - Vinateria Ricardo Reyes";
        $viewData["subtitle"] = "Lista de los productos";
        $viewData["licor"] = Licor::all();
        return view('licor.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $viewData = [];

        $licor = Licor::findOrFail($id);
        $viewData["title"] = $licor->getName() . " - Vinateria Ricardo Reyes ";
        $viewData["subtitle"] = "Licor - Detalle";
        $viewData["licor"] = $licor;
        return view('licor.show')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {

        $viewData = [];
        $viewData["title"] = "Licor - Vinateria Ricardo Reyes";
        $viewData["subtitle"] = "Lista de Licores";
        $viewData["venta"] = Ventas::where('user_id', Auth::id())->get();

        //calculamos el total de las ventas con un query builder
        $totalVentas = DB::table('licors')
            ->join('ventas', 'licors.id', '=', 'ventas.licor_id')
            ->where('ventas.user_id', Auth::id())
            ->sum('licors.precio');

        $viewData['totalVentas'] = $totalVentas;


        Ventas::validate($request);
        $newProduct = new Ventas();

        $newProduct->setIdLicor($request->input('licor_id'));
        $newProduct->setIdUser($request->input('user_id'));

        $newProduct->save();
        return view('venta.index')->with("viewData", $viewData);
    }
}
