@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo ingreso</h3>
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
			
	{!!Form::open(array('url'=>'compras/ingreso', 'method'=>'POST', 'autocomplete'=>'off'))!!}
	{{Form::token()}}
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group">
					<label for="nombre">Proveedor</label>
					<select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
						@foreach($personas as $persona)
							<option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label>Tipo comprobante</label>
					<!--las opciones se optienen de la tabla "categoria"-->
					<select name="tipo_comprobante" class="form-control">
						<option value="Boleta">Boleta</option>
						<option value="Factura">Factura</option>
						<option value="Ticket	">Ticket</option>
					</select>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="serie_comprobante">Serie comprobante</label>
					<input type="text" name="serie_comprobante" class="form-control" placeholder="Serie de comprobante" value="{{old('serie_comprobante')}}" />
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="num_comprobante">Número comprobante</label>
					<input type="text" name="num_comprobante" class="form-control" placeholder="Número de comprobante" required value="{{old('num_comprobante')}}" />
				</div>
			</div>
		</div>

		<div class="row">

			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="form-group">
						<!--"pidarticulo" será un auxiliar, ya que serán varios artpiculos que se agregará en un array que se evaluará en un javascript-->
							<label>Artículo</label>
							<select name="pidarticulo" class="form-control selectpicker" data-live-search="true" id="pidarticulo">
								@foreach($articulos as $articulo)
									<option value="{{$articulo->idarticulo}}">{{$articulo->articulo}}</option>
								@endforeach
							</select>
						</div>	
					</div>

					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label>Cantidad</label>
							<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad..." min="1"/>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label>Precio de compra</label>
							<input type="text" name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="Precio de compra..."/>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label>Precio de venta</label>
							<input type="text" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="Precio de venta..."/>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<button type="button" id="bt_add" class="btn btn-success">Agregar</button>		
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
							<thead style="background-color: #CEF6EC">
								<th>opciones</th>
								<th>Artículo</th>
								<th>Cantidad</th>
								<th>Precio de compra</th>
								<th>Precio de venta</th>
								<th>Subtotal</th>
							</thead>
							<tfoot>
								<th>Total</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th><h4 id="total">S/ 0.00</h4></th>
							</tfoot>
							<tbody>
								
							</tbody>
						</table>
					</div>

				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
				<div class="form-group">
					<!-- EL token permite trabajar con las transacciones-->
					<input type="hidden" name="token" value="{{csrf_token()}}"/>
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>
	{!!Form::close()!!}

	@push('scripts')
		<script>
		// Cuando el documento se empiece a ejecutar y cuando se haga clic al botón Agregar
			$(document).ready(function()
			{
				$('#bt_add').click(function()
				{
					Agregar();
				});
			});
			var cont = 0;
			// Variable que captura todos los subtotales de las líneas de los detalles
			subtotal = [];
			// Cuando cargue el documento, que el botón para guardar esté oculto
			$("#guardar").hide();
			var total = 0;

			// Función agregar, agrega a la tabla
			function Agregar()
			{
				// Leer los valores
				idarticulo = $("#pidarticulo").val();
				articulo = $("#pidarticulo option:selected").text();
				cantidad = $("#pcantidad").val();
				precio_compra = $("#pprecio_compra").val();
				precio_venta = $("#pprecio_venta").val();
				// Validar
				if (idarticulo != "" && cantidad != "" && precio_compra != "" && precio_venta != "")
				{
					subtotal[cont] = (cantidad * precio_compra);
					total = total + subtotal[cont];
					 var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
					cont = cont + 1;
					Limpiar();
					$("#total").html("S/ " + total);
					Evaluar();
					// Agregar la fila a la tabla
					$('#detalles').append(fila);
				}
				else
				{
					alert("Error al ingresar los detalles del ingreso");
				}
			}

			// Dos funciones para limpiar
			function Limpiar()
			{
				$("#pcantidad").val("");
				$("#pprecio_compra").val("");
				$("#pprecio_venta").val("");
			}

			// Evaluar, ocultar los botones cuando un ingreso no tenga detalles
			function Evaluar()
			{
				if (total > 0)
				{
					$("#guardar").show();
				}
				else
				{
					$("#guardar").hide();	
				}
			}

			// En la fila, hay una opción para eliminar 
			function eliminar(index)
			{
				total = total - subtotal[index];
				$("#total").html("S/ " + total);
				$("#fila" + index).remove();
				Evaluar();
			}
		</script>
	@endpush

@endsection