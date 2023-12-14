@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Edit Ventas
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.venta.update', ['id'=> $viewData['venta']->getId()]) }}"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Cliente:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">

                                <select name="user_id" class="form-control" >
                                    <option value={{ $viewData['venta']->user->id }} selected >{{ $viewData['venta']->user->name}}</option>
                                    @foreach ($viewData['usuarios'] as $usuario)
                                        <option value={{$usuario->id}}>{{$usuario->getName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Licor:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">

                                <select name="licor_id" class="form-control">
                                    <option value={{ $viewData['venta']->licor->id }} selected >{{ $viewData['venta']->licor->name}}</option>
                                    @foreach ($viewData['licores'] as $licor)
                                        <option value={{$licor->id}}>{{$licor->getName()}}</option>
                                    @endforeach
                                </select>


                               {{-- <input name="licor_id" value="{{ $viewData['venta']->licor->id }}" type="text" class="form-control"> --}}
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection