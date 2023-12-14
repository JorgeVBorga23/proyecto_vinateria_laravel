<?php

namespace App\Http\Controllers;


use App\Models\Licor;
use App\Models\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Licor - Vinateria Ricardo Reyes";
        $viewData["subtitle"] = "Historial de Ventas";
        $viewData["venta"] = Ventas::where('user_id', Auth::id())->get();


        //calculamos el total de las ventas con un query builder
        $totalVentas = DB::table('licors')
            ->join('ventas', 'licors.id', '=', 'ventas.licor_id')
            ->where('ventas.user_id', Auth::id())
            ->sum('licors.precio');

        $viewData['totalVentas'] = $totalVentas;
        return view('venta.index')->with("viewData", $viewData);
    }
}
