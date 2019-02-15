<!-- sidebar nav -->
<ul class="nav flex-column">
	<li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Dashboard</a></li>
	<li class="nav-item"><a class="nav-link" href="{{ url('/users') }}">Usuarios</a></li>
	@role('admin')
	<li class="nav-item"><a class="nav-link" href="{{ url('/roles') }}">Roles</a></li>
	<li class="nav-item"><a class="nav-link" href="{{ url('/permissions') }}">Permisos</a></li>
	@endrole
</ul>