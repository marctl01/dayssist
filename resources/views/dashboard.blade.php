@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.complements.sidebar')
        <div class="boxes">
                @php
                    $count = 0;
                @endphp
                    <div class="row justify-content-center">
                        @foreach ($calendar->getMonthLabels() as $months)
                            <div class="box" style="border: 1px solid #0000">
                                <a href="{{ route('calendar') }}">
                                    <span>{{$months}}</span>
                                </a>
                            </div>
                            @php
                                $count++;
                            @endphp

                            @if ($count % 3 == 0)
                                </div><div class="row justify-content-center">
                            @endif
                        @endforeach
                    </div>
                    @if ($count % 3 != 0)
                        </div>
                    @endif
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
