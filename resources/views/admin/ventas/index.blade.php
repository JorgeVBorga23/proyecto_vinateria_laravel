@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Agregar una Venta
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.venta.store') }}"enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Usuario:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">

                                <select name="user_id" class="form-control">
                                    @foreach ($viewData['usuarios'] as $usuario)
                                        <option value={{$usuario->id}}>{{$usuario->getName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Licor:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <select name="licor_id" class="form-control">
                                    @foreach ($viewData['licores'] as $licor)
                                        <option value={{$licor->id}}>{{$licor->getName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 col-sm-12">
                    <button type="submit" class="btn btn-primary">Guardar Venta</button>
                
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Administrador Venta
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Licor Comprado</th>
                        <th scope="col">Total</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData["venta"] as $loan)
                        <tr>
                            <td>{{ $loan->getId() }}</td>
                            <td>{{ $loan->user->name }}</td>
                            <td>{{ $loan->licor->name }}</td>
                            <td>${{ $loan->licor->precio }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.venta.edit', ['id'=> $loan->getId()])}}">
                                <i class="bi-pencil"></i>
                               
                            </td>
                            <td>
                                <form action="{{ route('admin.venta.delete', $loan->getId())}}" method="POST">
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