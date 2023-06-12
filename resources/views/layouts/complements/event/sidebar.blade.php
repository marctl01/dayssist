<style>
    .sidebar {
    height: 650px;
}
</style>
<div class="sidebar" style="display: flex; flex-direction: column; align-items: flex-start; height: 100vh !important">
    <a href="{{ url('/calendar') }}" class="sidebar-link" style="margin-bottom: 5px;">Calendar</a>
    <a href="{{ url('/events/create') }}" class="sidebar-link" style="margin-bottom: 5px;">Crear Evento</a>
    {{-- <a href="{{ url('/events/update') }}" class="sidebar-link" style="margin-bottom: 5px;">Modificar Evento</a> --}}
    {{-- <a href="{{ url('/events/delete/{month}/{day}') }}" class="sidebar-link" style="margin-bottom: 5px;">Eliminar Evento</a> --}}
    {{-- <a href="{{ url('/calendar') }}" class="sidebar-link" style="margin-bottom: 5px;">Calendar</a> --}}
</div>
