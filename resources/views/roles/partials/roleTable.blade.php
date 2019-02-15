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
		@foreach ($roles as $role)
		<tr>
			<td>{{ $role->id }}</td>
			<td>{{ $role->slug}}</td>
			<td>{{ $role->name }}</td>
			<td>{{ $role->description }}</td>
			<td>
				<ul class="list-inline">
					@can('see')
                	<li class="list-inline-item">
                		<a role="button" class="btn btn-outline-success" href="/roles/{{ $role->id }}" >Ver</a>
                	</li>
                	@endcan
                	@can('edit')
                	<li class="list-inline-item">@include('roles.partials.editRole')</li>
                	@endcan
                  	@can('delete')
                  	<li class="list-inline-item">@include('roles.partials.deleteRole')</li>      
                  	@endcan           
                </ul>				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{!! $roles->render() !!}