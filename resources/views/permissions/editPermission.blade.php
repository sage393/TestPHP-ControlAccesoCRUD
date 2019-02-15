@extends('layouts.app') 

@section('title')
Editar permiso
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
					
					@if ($errors->any())
                    <div class="alert alert-danger">
                    	<ul>
                        	@foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    	</ul>
                    </div><br />
                    @endif
                    
					<form method="POST" action="{{ route('permissions.update', $permission->id) }}">
						@method('PATCH')
						@csrf
						
						@include('permissions.partials.fieldsPermission')
                    	                    	
						<button type="submit" class="btn btn-default">Actualizar</button>
					</form>
					
				</div>					
			</div>
		</div>
	</div>
</div>
@endsection
