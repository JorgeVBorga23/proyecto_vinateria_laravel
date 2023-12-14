@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="row">
        @foreach ($viewData["licor"] as $licor)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="{{ asset('/storage/'.$licor->getImagen()) }}" class="card-img-top img-card">
                    <div class="card-body text-center">
                        <a href="{{ route('licor.show', ['id'=>  $licor->getId()]) }}"
                        class="btn bg-primary text-white">{{ $licor->getName() }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection