@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.sidebar')
        <div class="container mt-4">
            <h1>Dashboard Admin</h1>

            <a href="{{ route('adm_user') }}">Administrar usuario</a>
            <a href="{{ route('adm_event') }}">Administrar eventos</a>
        </div>
    </div>
</div>
@endsection