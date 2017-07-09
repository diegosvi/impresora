@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Listado de Modelo Impresoras <a href="modeloimpresora/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include ('inven.modeloimpresora.search')
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

				@foreach($modelo_impresoras as $modeloimpresora)
					<tr>
						<td>{{$modeloimpresora->idmodelo_impresoras}}</td>
						<td>{{$modeloimpresora->detalle}}</td>
						<td>
							<a href="{{URL::action('ModeloImpresoraController@edit', $modeloimpresora->idmodelo_impresoras)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$modeloimpresora->idmodelo_impresoras}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
				@include('inven.modeloimpresora.modal')
				@endforeach
			</table>
		</div>
		{{ $modelo_impresoras->render()}}
	</div>
</div>

@endsection