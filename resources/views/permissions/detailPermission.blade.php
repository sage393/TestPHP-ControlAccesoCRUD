@extends('layouts.app') 

@section('title')
Detalles de permiso
@endsection

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-1">@include('includes.sidebar')</div>
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">Permiso</div>

				<div class="card-body">
					@include('includes.sessionAlerts')
					
					<strong>ID:</strong> {{ $permission->id }} <br>
					<strong>Slug:</strong> {{ $permission->slug }} <br>
					<strong>Nombre:</strong> {{ $permission->name }} <br>
					<strong>Descripción:</strong> {{ $permission->description }}
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection
