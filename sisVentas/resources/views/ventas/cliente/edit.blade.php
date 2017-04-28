@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar cliente: {{$persona->nombre}}</h3>
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
			trabaja con el controlador "ClienteController"
			En ese caso solo necesita indicarle el método (Si es POST, es el store; si es DELETE, es destroy -->
			<!--En es caso es para editar (model) que recibe un id (ver la función "edit" del controlador-->
			{!!Form::model($persona, ['method' => 'PUT', 'route' => ['cliente.update', $persona->idpersona]])!!}
			{{Form::token()}}
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" class="form-control" required value="{{$persona->nombre}}" />
						</div>
					</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="direccion">Dirección</label>
					<input type="text" name="direccion" class="form-control" value="{{$persona->direccion}}" />
				</div>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo de documento</label>
					<select name="tipo_documento" class="form-control">
						@if ($persona->tipo_documento == 'DNI')
							<option value="DNI" selected>DNI</option>
							<option value="RUC">RUC</option>
							<option value="PAS">PAS</option>
						@elseif ($persona->tipo_documento == 'RUC')
							<option value="DNI">DNI</option>
							<option value="RUC" selected>RUC</option>
							<option value="PAS">PAS</option>
						@else
							<option value="DNI">DNI</option>
							<option value="RUC" selected>RUC</option>
							<option value="PAS" selected>PAS</option>
						@endif
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="num_documento">Número documento</label>
					<input type="text" name="num_documento" class="form-control" value="{{$persona->num_documento}}" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="telefono">Teléfono</label>
					<input type="text" name="telefono" class="form-control" placeholder="Número telefónico" value="{{$persona->telefono}}" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" placeholder="Email..." value="{{$persona->email}}" />
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