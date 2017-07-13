@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Listado de Impresiones <a href="impresion/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include ('inven.impresion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Id Impresora</th>
					<th>Fecha Inicio Impresion</th>
					<th>Fecha Fin Impresion</th>
					<th>Contador Inicio Impresion</th>
					<th>Contador Fin Impresion</th>
					<th>Diferencia Contador</th>
					<th>Observacion</th>

				</thead>

				@foreach($impresions as $impresion)
					<tr>
						<td>{{$impresion->idimpresions}}</td>
						<td>{{$impresion->impresora}}</td>
						<td>{{$impresion->fechainicioimpresion}}</td>
						<td>{{$impresion->fechafinimpresion}}</td>
						<td>{{$impresion->contadorinicioimpresion}}</td>
						<td>{{$impresion->contadorfinimpresion}}</td>
						<td>{{$impresion->difconinifinimpresion}}</td>
						<td>{{$impresion->observacion}}</td>
						<td>
							<a href="{{URL::action('ImpresionController@edit', $impresion->idimpresions)}}"><button class="btn btn-info">Editar</button></a>
							<!--<a href="" data-target="#modal-delete-{{$impresion->idimpresions}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>-->
						</td>
					</tr>
				@include('inven.impresion.modal')
				@endforeach
			</table>
		</div>
		{{ $impresions->render()}}
	</div>
</div>

@endsection