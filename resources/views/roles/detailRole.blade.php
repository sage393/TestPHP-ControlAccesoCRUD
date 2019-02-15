@extends('layouts.app') 

@section('title')
Detalles de rol
@endsection

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-1">@include('includes.sidebar')</div>
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">Rol</div>

				<div class="card-body">
					@include('includes.sessionAlerts')
					
					<strong>ID:</strong> {{ $role->id }} <br>
					<strong>Slug:</strong> {{ $role->slug}} <br>
					<strong>Nombre:</strong> {{ $role->name }} <br>
					<strong>Descripción:</strong> {{ $role->description }} <br>	
					<strong>Permisos asignados:</strong> @foreach($role->permissions as $permission) {{ $permission->name }}, @endforeach			
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection
