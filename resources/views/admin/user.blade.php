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
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Grupo</th>
                        <th>Grupo ID</th>
                        <th>Grupo ID</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> <input type="text" value="{{ $user->id }}" disabled></td>
                        <td> <input type="text" value="{{ $user->name }}" ></td>
                        <td> <input type="text" value="{{ $user->email }}" ></td>
                        <td>                 
                            <select name="rol_id"> 
                                <option value="1" @if($user->role->id == 1) selected @endif>Admin</option>
                                <option value="2" @if($user->role->id == 2) selected @endif>Cliente</option>
                            </select>
                        </td>
                        <td class="center">
                            @if(isset($user->groups->first()->name)) <input type="text" value="{{ $user->groups->first()->name }}" > 
                            @else <input type="text" value="0" placeholder="Sin grupo">
                            @endif
                        </td>
                        <td class="center">
                            @if(isset($user->groups->first()->id)) <input type="text" value="{{ $user->groups->first()->id }}" > 
                            @else <input type="text" value="0" placeholder="Sin grupo">
                            @endif
                        </td>
                        <td> <input type="button" value="Actualizar"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginator">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection