@extends('layouts.app') 

@section('title')
Editar rol
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
					
					@if ($errors->any())
                    <div class="alert alert-danger">
                    	<ul>
                        	@foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    	</ul>
                    </div><br />
                    @endif
                    
					<form method="POST" action="{{ route('roles.update', $role->id) }}">
						@method('PATCH')
						@csrf
						
						@include('roles.partials.fieldsRole')
                    	                    	
						<button type="submit" class="btn btn-default">Actualizar</button>
					</form>
					
				</div>					
			</div>
		</div>
	</div>
</div>
@endsection
