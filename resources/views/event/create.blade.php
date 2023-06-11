@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.event.sidebar')
        <div class="container mt-4">
            <h1>Event</h1>
            <form action="{{ route('events.create') }}" method="POST">
                @csrf
                <label for="title">Título:</label>
                <input type="text" name="title" id="title">
                <label for="description">Descripcion:</label>
                <input type="text" name="description" id="description">
                <label for="finish_date">Fecha de finalización:</label>
                <input type="date" name="finish_date" id="finish_date">


                <button type="submit" onclick="return confirm('¿Estás seguro de crear este evento?')">Crear evento</button>
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
@endsection
