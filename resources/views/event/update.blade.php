@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.event.sidebar')
        <div class="container mt-4">
            <h1>Event</h1>
            <p>Eventos dia actual:</p>
            <!-- print de los eventos de este dia, en form y con inputs -->
            
        </div>
    </div>
</div>
@endsection