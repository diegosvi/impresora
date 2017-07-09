@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Oficina: {{$oficina->detalle}}</h3>
			@if (count ($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)

					<li>{{$error}}</li>
					@endforeach

				</ul>
			</div>
			@endif

			{!!Form::model($oficina, ['method'=>'PATCH','route'=>['inven.oficina.update', $oficina->idoficinas]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="detalle">Detalle</label>
				<input type="text" name="detalle" class="form-control" value="{{$oficina->detalle}}" placeholder="Nombre oficina">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{{!!Form::close()!!}}
		</div>
	</div>
@endsection	