@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.complements.sidebar')
        <div class="boxes">
            <div class="row justify-content-center">
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Enero</span>
                    </a>
                </div>
                
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Febrero</span>
                    </a>
                </div>
            
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Marzo</span>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Abril</span>
                    </a>
                </div>
                
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Mayo</span>
                    </a>
                </div>
            
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Junio</span>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Julio</span>
                    </a>
                </div>
                
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Agosto</span>
                    </a>
                </div>
            
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Septiembre</span>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Octubre</span>
                    </a>
                </div>
                
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Noviembre</span>
                    </a>
                </div>
            
                <div class="box" style="border: 1px solid #0000">
                    <a href="{{ route('calendar') }}">
                        <span>Diciembre</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    // Obtener la fecha actual usando Carbon
    var now = moment();
    
    // Iterar sobre todos los meses y comparar la fecha actual
    $('.box').each(function() {
        var month = $(this).find('span').text();
        var date = moment(month + ' 1, ' + now.year(), 'MMMM D, YYYY');
        
        // Agregar la clase "box-pasado" si el mes ya ha pasado
        if (now.isAfter(date, 'month')) {
            $(this).addClass('box-pasado');
        }
        
        // Agregar la clase "box-activo" si el mes es el actual
        if (now.isSame(date, 'month')) {
            $(this).addClass('box-activo');
        }
    });
</script>
