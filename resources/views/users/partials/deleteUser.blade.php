<form method="POST" action="{{ route('users.destroy', $user->id) }}">
	@method('DELETE')
	@csrf
	<button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
</form>