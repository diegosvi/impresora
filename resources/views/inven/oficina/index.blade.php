@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> Listado de Oficinas <a href="oficina/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include ('inven.oficina.search')
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

				@foreach($oficinas as $oficina)
					<tr>
						<td>{{$oficina->idoficinas}}</td>
						<td>{{$oficina->detalle}}</td>
						<td>
							<a href="{{URL::action('OficinaController@edit', $oficina->idoficinas)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$oficina->idoficinas}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
				@include('inven.oficina.modal')
				@endforeach
			</table>
		</div>
		{{ $oficinas->render()}}
	</div>
</div>

@endsection