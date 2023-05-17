@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.admin.users.sidebar')
        <div class="container mt-4">
          <div>
            <h1>User Admin</h1>
            <div>
              <form action="{{ route('adm_users.delete')}}" method="POST"> 
                  @csrf
                  @method('DELETE')
                  <label for="name">Id:</label>
                  <input type="text" id="id" name="id" value="{{ old('name') }}" required/>
                  <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection