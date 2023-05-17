@extends('layouts.app')

@section('content')
<style>
    /* The alert message box */
.alert-succes {
  padding: 20px;
  background-color: #36f43f; /* Red */
  color: white;
  margin-bottom: 15px;
}
.alert-error {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}
</style>
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.admin.users.sidebar')
        <div class="container mt-4">
            <h1>User Admin</h1>
            @if(session('success'))
            <div class="alert-succes">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{session('success')}}
              </div>
            @endif
            @if(session('error'))
            <div class="alert-error">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{session('error')}}
              </div>
            @endif
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
@endsection