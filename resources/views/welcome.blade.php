@extends('layouts.app')
@section('content')
<section class="first-container">
    <div class="container-fluid textcenter spacetitle">
        <div class="row">
            <div class="col-md-12 container-first-title">
                <img src="{{ asset('img/icons/logo-home.svg') }}" alt="logo" class="logo">
                <h1 class="title">DAYSSIST</h1>
                <p class="subtitle textcenter">
                    Crea tus propios calendarios y compártelos con
                    tus círculos mas cercanos
                </p>
                <a href="{{ route('login') }}" class="btn btn-normal">Comenzar</a>
            </div>
        </div>
    </div>
</section>
<section class="second-container spacetitle">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 aligncenter alignright">
                <img src="{{ asset('img/first-image.png') }}" alt="illustration" class="illustration">
            </div>
            <div class="col-6 aligncenter textcenter">
                <p class="text textcenter">
                    Por tan solo 9,99€ al mes podrás crear tantos calendarios como quieras y disfrutar de nuestro servicio premium
                </p>
                <a href="{{ route('contact') }}" class="btn btn-normal">Mejora tu plan de subscripción</a>
            </div>
        </div>
    </div>
</section>
<section class="second-container spacetitle">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 aligncenter textcenter">
                <p class="text textcenter">
                    Cumple con tus fechas límite y las de tu circulo cercano gracias 
                    a nuestro calendario compartido
                </p>
                <a href="{{ route('contact') }}" class="btn btn-normal">Mas sobre nosotros</a>
            </div>
            <div class="col-6 aligncenter alignright">
                <img src="{{ asset('img/first-image.png') }}" alt="illustration" class="illustration">
            </div>
        </div>
    </div>
</section>
<section class="third-container spacetitle">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 aligncenter">
                <img src="{{ asset('img/second-image.png') }}" alt="illustration" class="illustration">
            </div>
            <div class="col-6 aligncenter textcenter">
                <p class="text textcenter">
                Sumérgete en el mundo de la organización<br>
                Aquí trata sobre algo más que organización. 
                Lee artículos sobre productividad, colaboración, etc.
                </p>
                <a href="{{ route('contact') }}" class="btn btn-normal">Aprende</a>
            </div>
        </div>
    </div>
</section>
@endsection