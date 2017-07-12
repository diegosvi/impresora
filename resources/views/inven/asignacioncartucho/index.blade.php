@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Listado de Asignacion Cartuchos <a href="asignacioncartucho/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include ('inven.asignacioncartucho.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Id Impresoras</th>
					<th>Id Cartuchos</th>
					<th>Fecha Asignacion</th>
				</thead>

				@foreach($asignacioncartuchos as $asignacioncartucho)
					<tr>
						<td>{{$asignacioncartucho->idasignacion_cartuchos}}</td>
						<td>{{$asignacioncartucho->impresora}}</td>
						<td>{{$asignacioncartucho->cartucho}}</td>
						<td>{{$asignacioncartucho->fechaasignacion}}</td>
						<td>
							<a href="{{URL::action('AsignacionCartuchoController@edit', $asignacioncartucho->idasignacion_cartuchos)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$asignacioncartucho->idasignacion_cartuchos}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
				@include('inven.asignacioncartucho.modal')
				@endforeach
			</table>
		</div>
		{{ $asignacioncartuchos->render()}}
	</div>
</div>

@endsection