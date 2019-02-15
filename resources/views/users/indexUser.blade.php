@extends('layouts.app') 

@section('title')
Usuarios
@endsection

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-1">@include('includes.sidebar')</div>
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">Usuarios</div>

				<div class="card-body">
					@include('includes.sessionAlerts')
					
					<p><a class="btn btn-light" href="{{ route('users.create') }}" role="button">Agregar usuario</a></p>
					
					@include('users.partials.userTable')
				</div>
				
				<div class="card-footer text-muted">                    
					{{ $users->total() }} Registros
                </div>				
			</div>
		</div>
	</div>
</div>
@endsection
