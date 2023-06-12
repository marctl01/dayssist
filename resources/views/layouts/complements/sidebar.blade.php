<div class="sidebar" style="display: flex; flex-direction: column; align-items: flex-start;">
    <a href="/calendar" class="sidebar-link" style="margin-bottom: 5px;">Mis calendarios</a>

    @if(auth()->user()->role->name == 'Coordinador')
        <a href="/groups_coord" class="sidebar-link" style="margin-bottom: 5px;">Mis Grupos</a>
        <a href="/events/create" class="sidebar-link" style="margin-bottom: 5px;">Crear evento</a>
    @endif

    @if(auth()->user()->role->name == 'Miembro')
        <a href="/groups_miembro" class="sidebar-link" style="margin-bottom: 5px;">Mis Grupos</a>
        <a href="/events/create" class="sidebar-link" style="margin-bottom: 5px;">Crear evento</a>
    @endif




</div>
