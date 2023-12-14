@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    
    <div class="row">
        <div class="col-lg-4 mb-2 imagenAnimada">
            <img src="{{ asset('/img/cavavinos.webp') }}"class="img-fluid rounded">
        </div>
        <div class="col-lg-4 mb-3 imagenAnimada">
            <img src="{{ asset('/img/fondo1.jpg') }}" class="img-fluid rounded">
        </div>
        <div class="col-lg-4 mb-3 imagenAnimada">
            <img src="{{ asset('/img/fondo.jpg') }}" class="img-fluid rounded">
        </div>
    </div>

    <div>
        <h1>Mision</1>
        <br>
        <p>Ser referentes en el desarrollo y crecimiento sustentable 
            de la vitivinicultura, cautivando a los consumidores alrededor
            del mundo, a través de la experiencia, innovación y calidad que
             distingue a nuestras marcas, junto con el trabajo de excelencia 
             de nuestras personas.</p>

    </div>
    <br>
    <div>
        <h1>Vision</1>
        <br>
        <p>Ser referentes mundiales de vino.</p>
    </div>
    <br>
    <div class="mapa">
        <h1 style=" aling-center">Ubicacion de la empresa</1>
        <br>
        <div class="mapa"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.2075250026355!2d-88.30450092505724!3d18.519521869206724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5ba49ee0db548f%3A0x594e36a768f1d1ad!2sITCH!5e0!3m2!1ses-419!2smx!4v1701989362011!5m2!1ses-419!2smx" width="1300" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    </div>
@endsection