@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
        <div class="card-header">
            Ventas
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha de Compra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData["venta"] as $venta)
                        <tr>
                            <td>
                                <img src="{{ asset('/storage/'.$venta->licor->getImagen())}}" class="img-fluid rounded-start">
                            </td>
                            <td>{{ $venta->licor->name }}</td>    
                            <td>${{ $venta->licor->precio }}</td> 
                            <td>{{ $venta->created_at }}</td> 
                                
                                                
                        </tr>
                    @endforeach
                </tbody>
            </table>

           <div>
            <p>Tu total de ventas es:  <button class="btn btn-dark " disabled >${{$viewData['totalVentas']}}</button> </p>
          
           </div>
        </div>
    </div>
@endsection