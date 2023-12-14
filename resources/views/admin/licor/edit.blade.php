@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Edit Licor
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.licor.update', ['id'=> $viewData['licor']->getId()]) }}"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name Licor:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ $viewData['licor']->getName() }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
                                <div class="col-lg-10 col-md-6 col-sm-12">
                                    <input name="precio" value="{{ $viewData['licor']->getPrecio() }}" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        
                    </div>
                    <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Descripcion:</label>
                                <div class="col-lg-10 col-md-6 col-sm-12">
                                    <input name="descripcion" value="{{ $viewData['licor']->getDescripcion() }}" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Imagen:</label>
                                <div class="col-lg-10 col-md-6 col-sm-12">
                                    <input class="form-control" type="file" name="imagen">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                        &nbsp;
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria:</label>

                        <select name="categoria_id" class="form-control">
                            <option value="{{ $viewData['licor']->categoria->id }}"  selected>{{$viewData['licor']->categoria->name}}</option>
                            @foreach ($viewData["categorias"] as $categoria )
                                <option value={{$categoria->id}}>{{$categoria->name}}</option>
                            @endforeach
                        </select>

                       
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection