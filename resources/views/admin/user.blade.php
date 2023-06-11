@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.admin.users.sidebar')
        <div class="container mt-4">
            <div>
                <h1>Administrar Usuarios</h1>
                <div>
                    <form action="{{ route('adm_users.search') }}" method="GET">
                        <input type="text" name="search" placeholder="Nombre del usuario">
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="id">Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> <input type="text" value="{{ $user->id }}" class="id center" disabled></td>
                        <td> <input type="text" value="{{ $user->name }}" class="center" ></td>
                        <td> <input type="text" value="{{ $user->email }}" class="center" ></td>
                        <td>                 
                            <select name="rol_id"> 
                                <option value="1" @if($user->role->id == 1) selected @endif>Admin</option>
                                <option value="2" @if($user->role->id == 2) selected @endif>Coordinador</option>
                                <option value="3" @if($user->role->id == 3) selected @endif>Miembro</option>
                            </select>
                        </td>

                        

                    
                        <td class="center">
                            <button onclick="update(this.parentNode.parentNode)" class="btn-dayssist">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <script>
                function update(d) {
                    let td = d.getElementsByTagName("td");

                    var id = td[0].children[0].value;
                    var name = td[1].children[0].value;
                    var email = td[2].children[0].value;
                    var rol = td[3].children[0].value;
                    // var group = td[4].children[0].value;

                    console.log(id);
                    console.log(name);
                    console.log(email);
                    console.log(rol);
                    // console.log(group);

                    // Obtén los datos del formulario en un objeto formData
                    var formData = new FormData();
                    formData.append('id', id);
                    formData.append('name', name);
                    formData.append('email', email);
                    formData.append('rol_id', rol);
                    // formData.append('group_id', group);

                    var formDataObject = Object.fromEntries(formData);
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


                    // Realiza la solicitud AJAX
                    $.ajax({
                    url: '/adm_users/update',
                    type: 'POST',
                    data: formDataObject,
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        // Maneja la respuesta exitosa del servidor
                        console.log(response);
                    }
                    });
                    
                }
            </script>
            <div class="paginator">
                {{ $users->appends(request()->query())->links() }}

            </div>
        </div>
    </div>
</div>
@endsection