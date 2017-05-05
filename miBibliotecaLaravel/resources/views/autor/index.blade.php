@extends('layouts.admin')
@section('contenido')

	@if(Session::has('message'))
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button>
			<h4>{{Session::get('message')}}</h4>
		</div>
	@endif

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTA DE AUTORES  <a href="autor/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('autor.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover"> 
					<thead>
						
						<th>NOMBRE</th>
						<th>DESCRIPCIÓN</th>
						<th>FOTO DEL AUTOR</th>
						<th>OBRA</th>
						<th>FECHA PUBLICACIÓN</th>
						<th>ISBN</th>
						<th>IMAGEN</th>
						<th>OPCIONES</th>
					</thead>

					@foreach($autores as $autor)
						<tr>
							
							<td>{{ $autor->nombre }}</td>
							<td>
							<textarea class="form-control" rows="5" name="descripcion" disabled>{{ $autor->descripcion }}</textarea>
							</td>
							<td>
								<img src="{{asset('imagenes/autores/'. $autor->imagen)}}", alt="{{$autor->nombre}}" height="100px" width="100px" class="img-thumbnail">
							</td>
							<td>{{ $autor->nombreObra }}</td>
							<td>{{ $autor->fechaPublicacion }}</td>
							<td>{{ $autor->isbn }}</td>
							<td>
								<img src="{{asset('imagenes/obras/'. $autor->imagenObra)}}", alt="{{$autor->nombreObra}}" height="100px" width="100px" class="img-thumbnail">
							</td>
							<td>
								<a href="{{URL::action('AutorController@edit', $autor->idautor)}}"><button class="btn btn-info">Editar</button></a> 
								<a href="" data-target="#modal-delete-{{$autor->idautor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a> 
							</td>
						</tr>
						@include('autor.modal')
					@endforeach

				</table>
			</div>
			{{$autores->render()}}
		</div>
	</div>
@endsection