@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo autor</h3>
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
	{!!Form::open(array('url'=>'autor', 'method'=>'POST', 'autocomplete'=>'off', 'files' =>'true'))!!}
	{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nombre">Autor</label>
					<!-- El name del imput, debe ser = al nombre de "AutorController"-->
					<input type="text" name="nombre" class="form-control" id="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Nombre del autor" required />
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="info"></div>
			</div>
		
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Descripción</label>
					<textarea class="form-control" rows="3" name="descripcion"></textarea>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="imagenAutor">Foto del autor</label>
					<input type="file" name="imagenAutor" class="form-control"/>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nombreObra">Obra</label>
					<input type="text" name="nombreObra" class="form-control" placeholder="Nombre de la obra" required value="{{old('nombreObra')}}" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="fechaPublicacion">Fecha de publicación</label>
					<input type="number" name="fechaPublicacion" class="form-control" required value="1500" min="1500" max="2017" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="isbn">Isbn</label>
					<input type="text" name="isbn" class="form-control" placeholder="ISBN de la obra" required value="{{old('isbn')}}" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="imagenObra">Imagen de la obra</label>
					<input type="file" name="imagenObra" class="form-control"/>
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

	@push('scripts')
		<script>
			var resultado = document.getElementById("info");
			function MostrarError()
			{
				var xmlHttp;
				if (window.XMLHttpRequest)
				{
					xmlHttp = new XMLHttpRequest();
				}
				else
				{
					xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				// Variable para el nombre del autor
				var nombreAutor = document.getElementById('nombre').value;
				// Respuesta de la función js
				var respuesta = validaNombre2(nombreAutor);
				if (respuesta == "poco")
				{
  					document.getElementById("info").innerHTML="<div class='alert alert-danger'><i class='fa fa-close'></i> Nombre mayor de 4 caracteres <input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";
				}
				else if (respuesta == "invalido") 
				{
					document.getElementById("info").innerHTML="<i class='fa fa-close'></i> <div class='alert alert-danger'><i class='fa fa-close'></i> Nombre inválido (sin caracteres numéricos)<input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";
				}
				else
				{
					document.getElementById("info").innerHTML="</i> <div class='alert alert-success'><i class='fa fa-close'></i>    Siga con los demás campos<input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div> ";
				}
			}
		</script>
	@endpush

@endsection