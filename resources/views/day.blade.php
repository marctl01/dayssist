@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.event.sidebar')
        <div class="container-day">
            <h1 class="text-center">Día: {{ $day }}</h1>
        </div>
        @foreach ($events as $event)

        <div class="container-drag">
            <div class="draggable-container" draggable="true">
                <input type="checkbox" class="checkbox">
                <label class="label">{{ $event->title }}</label>
            </div>
        </div>
        @endforeach


    </div>
</div>
<script>
var draggableContainers = document.querySelectorAll('.draggable-container');

draggableContainers.forEach(function(container) {
    container.addEventListener('dragstart', function(event) {
        event.dataTransfer.setData('text/plain', event.target.id);
        event.target.style.opacity = '0.4';
    });

    container.addEventListener('dragend', function(event) {
        event.target.style.opacity = '1';
    });
});
</script>
@endsection

