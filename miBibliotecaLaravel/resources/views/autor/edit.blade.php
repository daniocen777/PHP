@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar autor: {{ $autor->nombre }}</h3>
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

	{!!Form::model($autor, ['method' => 'PUT', 'route' => ['autor.update', $autor->idautor], 'files' => 'true'])!!}
	{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nombre">Autor</label>
					<!-- El name del imput, debe ser = al nombre de "AutorController"-->
					<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del autor" required value="{{ $autor->nombre }}" />
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="info"></div>
			</div>
		
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Descripción</label>
					<textarea class="form-control" rows="3" name="descripcion">{{ $autor->descripcion }}</textarea>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="imagenAutor">Foto del autor</label>
					<input type="file" name="imagenAutor" class="form-control" />
					@if (($autor->imagen) != "")
						<img src="{{asset('imagenes/autores/'.$autor->imagen)}}" height="100px" width="150px">
					@endif
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nombreObra">Obra</label>
					<input type="text" name="nombreObra" class="form-control" placeholder="Nombre de la obra" required value="{{ $obra->nombreObra }}" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="fechaPublicacion">Fecha de publicación</label>
					<input type="number" name="fechaPublicacion" class="form-control" required min="1500" max="2017" value="{{ $obra->fechaPublicacion }}" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="isbn">Isbn</label>
					<input type="text" name="isbn" class="form-control" placeholder="ISBN de la obra" required value="{{ $obra->isbn }}" />
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="imagenObra">Imagen de la obra</label>
					<input type="file" name="imagenObra" class="form-control"/>
					@if (($obra->imagen) != "")
						<img src="{{asset('imagenes/obras/'.$obra->imagen)}}" height="150px" width="100px">
					@endif
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Editar</button>
					<a href="{!!URL::to('/autor')!!}" class="btn btn-danger">Regresar</a>
				</div>
			</div>
		</div>
	{!!Form::close()!!}
@endsection