<div class="form-group row">
	<label for="name" class="col-sm-2 col-form-label text-right">Nombre</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="name" name="name"
			value="{{ $user->name }}">
	</div>
</div>

<div class="form-group row">
	<label for="email" class="col-sm-2 col-form-label text-right">Email</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="email" name="email"
			value="{{ $user->email }}">
	</div>
</div>

<div class="form-group row">
	<label for="role" class="col-sm-2 col-form-label text-right">Rol</label>
	<div class="col-sm-10">
		<select id="role" class="form-control" name="role"> 
		@foreach($roles as $role)
			<option value="{{ $role->id }}">{{ $role->name }}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="form-group row">
	<label for="password" class="col-sm-2 col-form-label text-right">Contraseña
	</label>
	<div class="col-sm-10">
		<input type="password" class="form-control" id="password"
			name="password">
	</div>
</div>

<div class="form-group row">
	<label for="password_confirmation"
		class="col-sm-2 col-form-label text-right">Confirme su contraseña</label>
	<div class="col-sm-10">
		<input type="password" class="form-control" id="password-confirm"
			name="password_confirmation">
	</div>
</div>