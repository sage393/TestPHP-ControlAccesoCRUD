<form method="POST" action="{{ route('roles.destroy', $role->id) }}">
	@method('DELETE')
	@csrf
	<button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
</form>