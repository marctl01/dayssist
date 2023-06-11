@extends('layouts.app')
<style>
.container.container-create {
    margin-top: 90px;
    margin-left: 30px;
    margin-bottom: 100px;
}
.container.container-add {
    margin-top: 90px;
    margin-left: 30px;
    margin-bottom: 100px;
}
</style>
@section('content')
<div class="container-fluid">
    <div class="row justify-content-space-between">
        @include('layouts.complements.sidebar')
        <div class="container mt-4">
            <div class="row">
                <div class="container container-create">
                    <form method="POST" action="{{ route('groups_coord.create_group') }}">
                        @csrf
                        <h4>Crear Grupo</h4>
                        <label>Nombre Grupo </label><br>
                        <input type="text" name="name" id="name"><br><br>
                        <label>Password </label><br>
                        <input type="text" name="password" id="password"><br><br>
                        <label>Confirmar Password </label><br>
                        <input type="text" name="password_confirm" id="password_confirm"><br><br>
                        <input type="submit" value="Crear">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="container container-add">
                    <form method="POST" action="{{ route('groups_coord.add_group') }}">
                        @csrf
                        <h4>Añadir Grupo</h4>
                        <label>Identificador Grupo </label><br>
                        <input type="text" name="group_id" id="group_id"><br><br>
                        <label>Password </label><br>
                        <input type="text" name="password" id="password"><br><br>
                        <input type="submit" value="Acceder"><br><br>
                    </form>
                    <div class="container container-perteneces">
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
</div>
@endsection
