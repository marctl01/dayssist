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
        </div>
    </div>
</div>
@endsection