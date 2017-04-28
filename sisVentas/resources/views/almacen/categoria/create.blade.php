@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva categoría</h3>
			<!-- Hay validaciones segúm "CategoriaFormrequest", en ese caso
			habrá algunas mensajes si no se cumplen
			Los errores ($errors) son devueltos de "CategoriaFormrequest" -->
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<!-- Mi formulario-->
			<!-- La ruta almacen/categoria (que está en routes/web.php)
			trabaja con el controlador "CategoriaController"
			En ese caso solo necesita indicarle el método (Si es POST, es el store; si es DELETE, es destroy -->
			{!!Form::open(array('url'=>'almacen/categoria', 'method'=>'POST', 'autocomplete'=>'off'))!!}
				{{Form::token()}}
				<div class="form-group">
					<label for="nombre">Nombre:</label>
					<!-- El name del imput, debe ser = al nombre de "CategoriaController"-->
					<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
				</div>
				<div class="form-group">
					<label for="descripcion">Descripción:</label>
					<!-- El name del imput, debe ser = al nombre de "CategoriaController"-->
					<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			{!!Form::close()!!}

		</div>
	</div>
@endsection