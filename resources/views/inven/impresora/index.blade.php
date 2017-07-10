@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Listado de Impresoras <a href="impresora/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include ('inven.impresora.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Id Modelo Impresora</th>
					<th>Numero Serie</th>
					<th>IP Impresora</th>
					<th>MAC Impesora</th>
					<th>Fecha Compra</th>
					<th>Estado</th>
					<th>Observacion</th>

				</thead>

				@foreach($impresoras as $impresora)
					<tr>
						<td>{{$impresora->idimpresoras}}</td>
						<td>{{$impresora->modeloimpresora}}</td>
						<td>{{$impresora->numeroserie}}</td>
						<td>{{$impresora->ipimpresora}}</td>
						<td>{{$impresora->macimpresora}}</td>
						<td>{{$impresora->fechacompra}}</td>
						<td>{{$impresora->estado}}</td>
						<td>{{$impresora->observacion}}</td>
						<td>
							<a href="{{URL::action('ImpresoraController@edit', $impresora->idimpresoras)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$impresora->idimpresoras}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
				@include('inven.impresora.modal')
				@endforeach
			</table>
		</div>
		{{ $impresoras->render()}}
	</div>
</div>

@endsection