@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('/storage/'.$viewData["licor"]->getImagen()) }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                    {{ $viewData["licor"]->getName() }} (${{ $viewData["licor"]->getPrecio() }})
                    </h5>
                    <p class="card-text"> Categoria: {{ $viewData["licor"]->categoria->name }}</p>
                    
                    <p class="card-text">
                        <form method="POST" action="{{route('venta.store')}}" >
                        <input name="licor_id" value="{{$viewData["licor"] ->getId() }}" type="number" class="form-control" style="display:none">
                        <input name="user_id" value="{{ Auth::id()}}" type="number" class="form-control" style="display:none">
                        
                        
                            <div class="row">
                                @csrf
                                <div class="col-auto">
                                </div>
                                <div class="col-auto" >
                                    <button class="btn bg-primary text-white" type="submit" >Comprar</button>
                                </div>
                            </div>
                        </form>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection