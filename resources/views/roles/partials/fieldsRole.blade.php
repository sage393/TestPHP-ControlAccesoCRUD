<div class="form-group row">
	<label for="slug" class="col-sm-2 col-form-label text-right">Slug</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="slug" name="slug"
			value="{{ $role->slug }}">
	</div>
</div>

<div class="form-group row">
	<label for="name" class="col-sm-2 col-form-label text-right">Nombre</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="name" name="name"
			value="{{ $role->name }}">
	</div>
</div>

<div class="form-group row">
	<label for="description" class="col-sm-2 col-form-label text-right">Descripcion</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="description" name="description"
			value="{{ $role->description }}">
	</div>
</div>

<div class="form-group row">
	<label for="permissions" class="col-sm-2 col-form-label text-right">Permisos</label>
	<div class="col-sm-10">
		@foreach($permissions as $permission)
		<input type="checkbox" id="permissions" name="permissions[]" value="{{ $permission->id }}" @if($role->permissions->contains($permission)) checked="checked" @endif>
		{{ $permission->name }}</br> 
		@endforeach
	</div>
</div>