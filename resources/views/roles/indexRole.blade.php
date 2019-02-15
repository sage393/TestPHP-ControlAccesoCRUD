@extends('layouts.app') 

@section('title')
Roles
@endsection

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-1">@include('includes.sidebar')</div>
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">Roles</div>

				<div class="card-body">
					@include('includes.sessionAlerts')
					
					<p><a class="btn btn-light" href="{{ route('roles.create') }}" role="button">Agregar rol</a></p>
					
					@include('roles.partials.roleTable')
				</div>
				
				<div class="card-footer text-muted">                    
					{{ $roles->total() }} Registros
                </div>				
			</div>
		</div>
	</div>
</div>
@endsection
