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
                <label for="title">Fecha Inicio:</label>
                <input type="text" name="start_date" id="start_date">
                <label for="title">Fecha Fin:</label>
                <input type="text" name="finish_date" id="finish_date">
                <label for="title">Creador:</label>
                <input type="text" name="creator_id" id="creator_id">
                <label for="title">Grupo:</label>
                <input type="text" name="group_id" id="group_id">
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