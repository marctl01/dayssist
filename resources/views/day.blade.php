@extends('layouts.app')
@section('content')

<style>
    #datepicker {
      width: 200px;
      padding: 10px;
      font-size: 16px;
    }

    #datepicker-button {
      margin-left: 10px;
      padding: 8px 12px;
      font-size: 14px;
    }
    </style>


<style>
    .container {
    display: flex;
    justify-content: space-between;
}

.draggable-container {
    width: 200px;
    height: 150px;
    border: 1px solid #ccc;
    padding: 10px;
    background-color: #f0f0f0;
    cursor: move;
}

.checkbox {
    width: 50px;
    height: 50px;
    margin-bottom: 10px;
}

.label {
    font-size: 16px;
}
</style>
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
                <form action="{{ route('events.delete', $event->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                <form action="{{ route('events.update', $event->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" value="{{ $event->title }}">
                    <input type="text" name="description" value="{{ $event->description }}">
                    <input type="date" name="finish_date" value="{{ $event->finish_date }}">
                    <input type="submit" value="Actualizar">
                </form>

                {{-- <label class="label">{{ $event->title }}</label> --}}
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

