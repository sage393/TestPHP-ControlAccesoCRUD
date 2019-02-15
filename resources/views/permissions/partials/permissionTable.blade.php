<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Slug</th>
			<th scope="col">Nombre</th>
			<th scope="col">Descripción</th>
			<th colspan="2" scope="col">Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($permissions as $permission)
		<tr>
			<td>{{ $permission->id }}</td>
			<td>{{ $permission->slug }}</td>
			<td>{{ $permission->name }}</td>
			<td>{{ $permission->description }}</td>
			<td>
				<ul class="list-inline">
					@can('see')
                	<li class="list-inline-item">
                		<a role="button" class="btn btn-outline-success" href="/permissions/{{ $permission->id }}" >Ver</a>
                	</li>
                	@endcan
					@can('edit')
                	<li class="list-inline-item">@include('permissions.partials.editPermission')</li>
                	@endcan
                	@can('delete')
                  	<li class="list-inline-item">@include('permissions.partials.deletePermission')</li>
                  	@endcan                 
                </ul>				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{!! $permissions->render() !!}