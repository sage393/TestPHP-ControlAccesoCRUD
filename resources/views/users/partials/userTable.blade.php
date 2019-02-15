<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">Email</th>
			<th scope="col">Roles</th>
			<th colspan="2" scope="col">Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>
				@foreach ($user->roles as $role)
					{{ $role->name }}, 
				@endforeach
			</td>
			<td>
				<ul class="list-inline">
					@can('see')
                	<li class="list-inline-item">
                		<a role="button" class="btn btn-outline-success" href="/users/{{ $user->id }}" >Ver</a>
                	</li>
                	@endcan
					@can('edit')
                	<li class="list-inline-item">@include('users.partials.editUser')</li>
                	@endcan
                	@can('delete')
                  	<li class="list-inline-item">@include('users.partials.deleteUser')</li>
                  	@endcan                 
                </ul>				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{!! $users->render() !!}