@extends('layouts.app')
@section('content')

<style>
.container {
    display: flex;
    justify-content: space-between;
}

.card {
    width: min-content;
    height: min-content;
    border: 1px solid #ccc;
    padding: 10px;
    background-color: #f0f0f0;
    cursor: move;
    margin-bottom: 10px;
}

.card form {
    display: inline;
    margin-bottom: 0;
}

.card form button {
    margin-top: 5px;
}

.card input[type="text"],
.card input[type="date"],
.card input[type="submit"] {
    margin-bottom: 5px;
}

.text-top {
    margin-top: 20px;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.alert p {
    margin: 0;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

</style>
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.event.sidebar')
        <div class="container mt-4">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <div class="container container-day">
                <h1 class="text-center text-top">Día: {{ $day }}</h1>
            </div>
            @foreach ($events as $event)
            <div class="card" draggable="true" id="{{ $event->id }}">
                <span>{{ $event->group_id }}. {{ $event->group_name }}</span>
                <form action="{{ route('events.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if ($event->checked == true)
                        <input type="checkbox" name="completed" checked>
                        <span>Hecho</span>
                    @else
                        <input type="checkbox" name="completed">
                        <span>Hecho</span>
                    @endif
                    <input type="text" name="title" value="{{ $event->title }}">
                    <input type="text" name="description" value="{{ $event->description }}">
                    <input type="date" name="finish_date" value="{{ $event->finish_date }}">

                    <input type="submit" value="Actualizar">
                </form>
                <form action="{{ route('events.delete', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
<script>
var draggableCards = document.querySelectorAll('.card');

draggableCards.forEach(function(card) {
    card.addEventListener('dragstart', function(event) {
        event.dataTransfer.setData('text/plain', event.target.id);
        event.target.style.opacity = '0.4';
    });

    card.addEventListener('dragend', function(event) {
        event.target.style.opacity = '1';
    });

    card.addEventListener('dragover', function(event) {
        event.preventDefault();
    });

    card.addEventListener('drop', function(event) {
        event.preventDefault();
        var data = event.dataTransfer.getData('text/plain');
        var sourceCard = document.getElementById(data);
        var targetCard = event.target.closest('.card');
        var container = targetCard.parentNode;
        container.insertBefore(sourceCard, targetCard);
    });
});
</script>

@endsection
