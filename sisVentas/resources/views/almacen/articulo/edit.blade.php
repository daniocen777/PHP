@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar artículo: {{$articulo->nombre}}</h3>
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
			<!--En es caso es para editar (model) que recibe un id (ver la función "edit" del controlador-->
			{!!Form::model($articulo, ['method' => 'PUT', 'route' => ['articulo.update', $articulo->idarticulo], 'files' => 'true'])!!}
			{{Form::token()}}
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<!-- El name del imput, debe ser = al nombre de "CategoriaController"-->
							<input type="text" name="nombre" class="form-control" required value="{{$articulo->nombre}}" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Categoría</label>
							<!--las opciones se optienen de la tabla "categoria"-->
							<select name="idcategoria" class="form-control">
								@foreach ($categorias as $cat)
									@if ($cat->idcategoria == $articulo->idarticulo)
										<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
									@else
										<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="codigo">Código</label>
							<input type="text" name="codigo" class="form-control" required value="{{$articulo->codigo}}" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="stock">Stock</label>
							<input type="number" min="0" name="stock" class="form-control" required value="{{$articulo->stock}}" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="descripcion">Descripción</label>
							<input type="text" name="descripcion" class="form-control" value="{{$articulo->descripcion}}" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="imagen">Imagen</label>
							<input type="file" name="imagen" class="form-control"/>
							@if (($articulo->imagen) != "")
								<img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="300px" width="300px">
							@endif
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