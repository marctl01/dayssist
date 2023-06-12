@extends('layouts.app')

@section('content')
<style>
    .sidebar{
        height: 100vh !important;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.event.sidebar')
        <div class="container mt-4">
            <h1>Event</h1>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Creador ID</th>
                        <th>Grupo ID</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->finish_date }}</td>
                        <td>{{ $event->creator_id }}</td>
                        <td>{{ $event->group_id }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $events->links() }}
        </div>
    </div>
</div>
@endsection