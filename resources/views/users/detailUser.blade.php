@extends('layouts.app') 

@section('title')
Detalles de usuario
@endsection

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-1">@include('includes.sidebar')</div>
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">Usuario </div>

				<div class="card-body">
					@include('includes.sessionAlerts')
					
					<strong>ID:</strong> {{ $user->id }} <br>
					<strong>Nombre:</strong> {{ $user->name }} <br>
					<strong>Email:</strong> {{ $user->email }} <br>
					<strong>Rol:</strong> @foreach($user->roles as $role) {{ $role->name }}, @endforeach 					
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection
