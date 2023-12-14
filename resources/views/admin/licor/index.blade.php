@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Panel de registro
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.licor.store') }}"enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre del licor:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="precio" value="{{ old('precio') }}" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Descripcion del licor:</label>
                                <div class="col-lg-10 col-md-6 col-sm-12">
                                    <input name="descripcion" value="{{ old('descripcion') }}" type="text" class="form-control">
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

                        @foreach ($viewData["categorias"] as $categoria )
                            <option value={{$categoria->id}}>{{$categoria->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            panel de registro
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre del licor</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th>Categoria</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData["licor"] as $licor)
                        <tr>
                            <td>{{ $licor->getId() }}</td>
                            <td>{{ $licor->getName() }}</td>
                            <td>{{ $licor->getDescripcion() }}</td>
                            <td>{{ $licor->getPrecio() }}</td>
                            <td>{{ $licor->categoria->name }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.licor.edit', ['id'=> $licor->getId()])}}">
                                <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.licor.delete', $licor->getId())}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection