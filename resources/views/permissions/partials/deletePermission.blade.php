<form method="POST" action="{{ route('permissions.destroy', $permission->id) }}">
	@method('DELETE')
	@csrf
	<button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
</form>