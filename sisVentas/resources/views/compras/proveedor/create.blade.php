@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo proveedor</h3>
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
		</div>
	</div>
			<!-- Mi formulario-->
			<!-- La ruta almacen/categoria (que está en routes/web.php)
			trabaja con el controlador "CategoriaController"
			En ese caso solo necesita indicarle el método (Si es POST, es el store; si es DELETE, es destroy -->
	{!!Form::open(array('url'=>'compras/proveedor', 'method'=>'POST', 'autocomplete'=>'off'))!!}
	{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<!-- El name del imput, debe ser = al nombre de "CategoriaController"-->
					<input type="text" name="nombre" class="form-control" placeholder="Nombre..." required value="{{old('nombre')}}" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="direccion">Dirección</label>
					<!-- El name del imput, debe ser = al nombre de "CategoriaController"-->
					<input type="text" name="direccion" class="form-control" placeholder="Dirección..." value="{{old('direccion')}}" />
				</div>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo de documento</label>
					<!--las opciones se optienen de la tabla "categoria"-->
					<select name="tipo_documento" class="form-control">
						<option value="DNI">DNI</option>
						<option value="RUC">RUC</option>
						<option value="PAS">PAS</option>
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="num_documento">Número documento</label>
					<input type="text" name="num_documento" class="form-control" placeholder="Número de documento..." value="{{old('num_documento')}}" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefono">Teléfono</label>
					<input type="text" name="telefono" class="form-control" placeholder="Número telefónico" value="{{old('telefono')}}" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" placeholder="Email..." value="{{old('email')}}" />
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>
	{!!Form::close()!!}
@endsection