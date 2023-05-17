@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.admin.users.sidebar')
        <div class="container mt-4">
            <h1>Usuario Admin</h1>
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
                        <td class="center">{{ $user->groups->first()->name }}</td>
                        <td class="center">{{ $user->groups->first()->id }}</td>
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