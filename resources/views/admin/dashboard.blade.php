@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.admin.sidebar')
        <div class="container mt-4">
            <h1>Welcome Admin</h1>
        </div>
    </div>
</div>
@endsection