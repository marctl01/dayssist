@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.admin.users.sidebar')
        <div class="container mt-4">
            <h1>Usuario Admin</h1>

            <form action="{{ route('adm_users.search') }}" method="GET">
                <input type="text" name="search" placeholder="Nombre del usuario">
                <button type="submit">Buscar</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Grupo</th>
                        <th>Grupo ID</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td class="center">
                            @if(isset($user->groups->first()->name)) {{ $user->groups->first()->id }} 
                            @else Sin grupo.
                            @endif
                        </td>
                        <td class="center">
                            @if(isset($user->groups->first()->id)) {{ $user->groups->first()->id }} 
                            @else Sin grupo.
                            @endif
                        </td>
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