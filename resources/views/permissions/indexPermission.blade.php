@extends('layouts.app') 

@section('title')
Permisos
@endsection

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-1">@include('includes.sidebar')</div>
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">Permisos</div>

				<div class="card-body">
					@include('includes.sessionAlerts')
					
					<p><a class="btn btn-light" href="{{ route('permissions.create') }}" role="button">Agregar permiso</a></p>
					
					@include('permissions.partials.permissionTable')
				</div>
				
				<div class="card-footer text-muted">                    
					{{ $permissions->total() }} Registros
                </div>				
			</div>
		</div>
	</div>
</div>
@endsection
