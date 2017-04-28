@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva venta</h3>
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
			
	{!!Form::open(array('url'=>'ventas/venta', 'method'=>'POST', 'autocomplete'=>'off'))!!}
	{{Form::token()}}
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group">
					<label for="cliente">Cliente</label>
					<select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
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
									<option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_promedio}}">{{$articulo->articulo}}</option>
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
							<label for="stock">Stock</label>
							<input type="number" name="pstock" id="pstock" disabled class="form-control min="1"/>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label>Precio de venta</label>
							<input type="text" name="pprecio_venta" disabled id="pprecio_venta" class="form-control" placeholder="Precio de venta..."/>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label for="descuento">Descuento</label>
							<input type="text" name="pdescuento" id="pdescuento" class="form-control" />
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
								<th>Precio de venta</th>
								<th>Descuento</th>
								<th>Subtotal</th>
							</thead>
							<tfoot>
								<th>Total</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th><h4 id="total">S/ 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
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
			// Para el valor del articulo (value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_promedio}}")
			$("#pidarticulo").change(MostrarValores);	
			function MostrarValores()
			{
				var datosArticulo = document.getElementById('pidarticulo').value.split('_');
				$("#pprecio_venta").val(datosArticulo[2]);
				$("#pstock").val(datosArticulo[1]);
			}


			var total = 0;

			// Función agregar, agrega a la tabla
			function Agregar()
			{
				var datosArticulo = document.getElementById('pidarticulo').value.split('_');
				// Leer los valores
				idarticulo = datosArticulo[0];
				articulo = $("#pidarticulo option:selected").text();
				cantidad = $("#pcantidad").val();
				descuento = $("#pdescuento").val();
				precio_venta = $("#pprecio_venta").val();
				stock = $("#pstock").val();
				// Validar
				if (idarticulo != "" && cantidad != "" && descuento != "" && precio_venta != "")
				{
					// Validar el stock
					if (Number(stock)>=Number(cantidad))
					{
						subtotal[cont] = (cantidad * precio_venta) - descuento;
						total = total + subtotal[cont];
						var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
					cont = cont + 1;
					Limpiar();
					$("#total").html("S/ " + total);
					$("#total_venta").val(total);
					Evaluar();
					// Agregar la fila a la tabla
					$('#detalles').append(fila);
					}
					else
					{
						alert("La cantidad a vender supera el stock");
					}
				}
				else
				{
					alert("Error al ingresar los detalles de la venta");
				}
			}

			// Dos funciones para limpiar
			function Limpiar()
			{
				$("#pcantidad").val("");
				$("#descuento").val("");
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
				$("#total_venta").val(total);	
				$("#fila" + index).remove();
				Evaluar();
			}
		</script>
	@endpush

@endsection