@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Listado de Modelo Cartuchos <a href="modelocartucho/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include ('inven.modelocartucho.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Detalle</th>
				</thead>

				@foreach($modelo_cartuchos as $modelocartucho)
					<tr>
						<td>{{$modelocartucho->idmodelo_cartuchos}}</td>
						<td>{{$modelocartucho->detalle}}</td>
						<td>
							<a href="{{URL::action('ModeloCartuchoController@edit', $modelocartucho->idmodelo_cartuchos)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$modelocartucho->idmodelo_cartuchos}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
				@include('inven.modelocartucho.modal')
				@endforeach
			</table>
		</div>
		{{ $modelo_cartuchos->render()}}
	</div>
</div>

@endsection