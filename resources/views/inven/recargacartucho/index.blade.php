@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Listado de Recarga Cartuchos <a href="recargacartucho/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include ('inven.recargacartucho.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Id Cartucho</th>
					<th>Numero Recarga</th>
					<th>Fecha Inicio Recarga</th>
					<th>Fecha Fin Recarga</th>
					<th>Contador Inicio Recarga</th>
					<th>Contador Fin Recarga</th>
					<th>Diferencia Contador</th>
					<th>Observacion</th>

				</thead>

				@foreach($recargacartuchos as $recargacartucho)
					<tr>
						<td>{{$recargacartucho->idrecarga_cartuchos}}</td>
						<td>{{$recargacartucho->cartucho}}</td>
						<td>{{$recargacartucho->numerorecarga}}</td>
						<td>{{$recargacartucho->fechainiciorecarga}}</td>
						<td>{{$recargacartucho->fechafinrecarga}}</td>
						<td>{{$recargacartucho->contadoriniciorecarga}}</td>
						<td>{{$recargacartucho->contadorfinrecarga}}</td>
						<td>{{$recargacartucho->difcontinifinrecarga}}</td>
						<td>{{$recargacartucho->observacion}}</td>
						<td>
							<a href="{{URL::action('RecargaCartuchoController@edit', $recargacartucho->idrecarga_cartuchos)}}"><button class="btn btn-info">Editar</button></a>
							<!--<a href="" data-target="#modal-delete-{{$recargacartucho->idrecarga_cartuchos}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>-->
						</td>
					</tr>
				@include('inven.recargacartucho.modal')
				@endforeach
			</table>
		</div>
		{{ $recargacartuchos->render()}}
	</div>
</div>

@endsection