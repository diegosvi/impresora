@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Listado de Asignacion Impresoras <a href="asignacionimpresora/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include ('inven.asignacionimpresora.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Id Areas</th>
					<th>Id Cartuchos</th>
					<th>Id Oficinas</th>
					<th>Fecha Asignacion</th>
				</thead>

				@foreach($asignacionimpresoras as $asignacionimpresora)
					<tr>
						<td>{{$asignacionimpresora->idasignacion_impresoras}}</td>
						<td>{{$asignacionimpresora->area}}</td>
						<td>{{$asignacionimpresora->oficina}}</td>
						<td>{{$asignacionimpresora->impresora}}</td>
						<td>{{$asignacionimpresora->fechaasignacion}}</td>
						<td>
							<a href="{{URL::action('AsignacionImpresoraController@edit', $asignacionimpresora->idasignacion_impresoras)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$asignacionimpresora->idasignacion_impresoras}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
				@include('inven.asignacionimpresora.modal')
				@endforeach
			</table>
		</div>
		{{ $asignacionimpresoras->render()}}
	</div>
</div>

@endsection