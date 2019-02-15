<div class="form-group row">
	<label for="slug" class="col-sm-2 col-form-label text-right">Slug</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="slug" name="slug"
			value="{{ $permission->slug}}">
	</div>
</div>

<div class="form-group row">
	<label for="name" class="col-sm-2 col-form-label text-right">Nombre</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="name" name="name"
			value="{{ $permission->name }}">
	</div>
</div>

<div class="form-group row">
	<label for="description" class="col-sm-2 col-form-label text-right">Descripción</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="description" name="description"
			value="{{ $permission->description }}">
	</div>
</div>
