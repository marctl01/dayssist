@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.admin.users.sidebar')
        <div class="container mt-4">
            <style></style>
            <h1>User Admin</h1>
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
                        <td>{{ $user->groups->first()->name }}</td>
                        <td>{{ $user->groups->first()->id }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Mostrar los registros -->


<!-- Mostrar los enlaces de paginación -->
    {{ $users->links() }}

        </div>
    </div>
</div>
@endsection