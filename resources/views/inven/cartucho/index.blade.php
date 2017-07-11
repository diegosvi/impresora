@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Listado de Cartuchos <a href="cartucho/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include ('inven.cartucho.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Id Modelo Cartucho</th>
					<th>Codigo Interno</th>
					<th>Contador Inicial Recarga</th>
					<th>Fecha Compra</th>
					<th>Numero Factura</th>
					<th>Estado</th>
					<th>Observacion</th>

				</thead>

				@foreach($cartuchos as $cartucho)
					<tr>
						<td>{{$cartucho->idcartuchos}}</td>
						<td>{{$cartucho->modelocartucho}}</td>
						<td>{{$cartucho->codigointerno}}</td>
						<td>{{$cartucho->contadorinicialrecarga}}</td>
						<td>{{$cartucho->fechacompra}}</td>
						<td>{{$cartucho->numerofactura}}</td>
						<td>{{$cartucho->estado}}</td>
						<td>{{$cartucho->observacion}}</td>
						<td>
							<a href="{{URL::action('CartuchoController@edit', $cartucho->idcartuchos)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$cartucho->idcartuchos}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
				@include('inven.cartucho.modal')
				@endforeach
			</table>
		</div>
		{{ $cartuchos->render()}}
	</div>
</div>

@endsection