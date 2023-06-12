@extends('layouts.app')

@section('content')
<style>
    .container-formulario-evento{
        margin-top: -50px;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.event.sidebar')
        <div class="container mt-4">
            <div class="container container-day">
                <h1 class="text-center text-top"> Eventos del Día</h1>
            </div>
            <div class="container container-formulario-evento">
                <form action="{{ route('events.create') }}" method="POST">
                    @csrf
                    <label for="title">Título</label><br>
                    <input type="text" name="title" id="title"><br><br>
                    <label for="description">Descripcion</label><br>
                    <input type="text" name="description" id="description"><br><br>
                    <label for="finish_date">Fecha de finalización:</label><br>
                    <input type="date" name="finish_date" id="finish_date"><br><br>
                    <select name="group_id">
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit">Crear evento</button>
                </form>
                @if(session('success'))
                <div class="alert-succes">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {{session('success')}}
                </div>
                @endif
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
