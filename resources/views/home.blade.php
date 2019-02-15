@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-1">@include('includes.sidebar')</div>
		<div class="col-md-11">
			<div class="card">
				<div class="card-header">Dashboard</div>

				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success" role="alert">{{ session('status')
						}}</div>
					@endif

					<p>
					
					
					<h4>Leyenda</h4>
					Bienvenido al sistema de administración de usuarios, roles y
					permisos. El proyecto consta de los siguientes contenidos para
					poder realizar pruebas:
					<ul>
						<li>Cuatro usuarios</li>
						<li>Tres roles</li>
						<li>Cuatro permisos</li>
					</ul>
					</p>

					<p>
					
					
					<h4>Detalle de usuarios roles y permisos</h4>
					<h5>Usuarios</h5>
					<ul>
						<li>Administrador
							<ul>
								<li>Administrador</li>
							</ul>
						</li>
						<li>Invitado
							<ul>
								<li>Invitado</li>
							</ul>
						</li>
						<li>Editor
							<ul>
								<li>Editor</li>
							</ul>
						</li>
						<li>Samuel
							<ul>
								<li>Administrador</li>
							</ul>
						</li>
					</ul>
					<h5>Roles</h5>
					<ul>
						<li>Administrador
							<ul>
								<li>ver</li>
								<li>crear</li>
								<li>editar</li>
								<li>eliminar</li>
							</ul>
						</li>
						<li>Invitado
							<ul>
								<li>ver</li>
							</ul>
						</li>
						<li>Editor
							<ul>
								<li>ver</li>
								<li>editar</li>
							</ul>
						</li>
					</ul>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
