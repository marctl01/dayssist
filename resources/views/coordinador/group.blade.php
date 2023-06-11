@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.sidebar')
        <div class="container mt-4">
            <div>
                <form method="POST" action="{{ route('groups_coord.create_group') }}">
                    @csrf
                    <p>Nombre Grupo </p>
                    <input type="text" name="name" id="name">
                    <p>Password </p>
                    <input type="text" name="password" id="password">
                    <p>Confirmar Password </p>
                    <input type="text" name="password_confirm" id="password_confirm">
                    <input type="submit" value="Crear">
                </form>

                <form method="POST" action="{{ route('groups_coord.add_group') }}">
                    @csrf
                    <p>Id Grupo </p>
                    <input type="text" name="group_id" id="group_id">
                    <p>Password </p>
                    <input type="text" name="password" id="password">
                    <input type="submit" value="Acceder">
                </form>

                <div>
                    Perteneces a estos grupos: 
                    @foreach ($groups as $group)
                    <div>
                        <p>{{ $group->name }}</p>
                        <form action="{{ route('groups_coord.delete', ['group' => $group->id, 'user' => auth()->user()->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </div>
                @endforeach
                
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
