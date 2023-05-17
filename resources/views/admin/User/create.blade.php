@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.admin.users.sidebar')
        <div class="container mt-4">
            <h1>User Admin</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('adm_users.create')}}" method="POST"> 
                @csrf
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" required/>

                <label for="password">Password:</label>
                <input type="text" id="password" name="password" required/>

                <label for="password_confirmation">Confirm Password:</label>
                <input type="text" id="password_confirmation" name="password_confirmation" required/>

                <label for="rol_id">Rol:</label>
                <input type="text" id="rol_id" name="rol_id"/>

                <input type="submit" value="Send"/>
            </form>
        </div>
    </div>
</div>
@endsection
