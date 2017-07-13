@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Asignacion Impresora: {{$asignacionimpresora->fechaasignacion}}</h3>
			@if (count ($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)

					<li>{{$error}}</li>
					@endforeach

				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::model($asignacionimpresora, ['method'=>'PATCH','route'=>['inven.asignacionimpresora.update', $asignacionimpresora->idasignacion_impresoras]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label >Area</label>
				<select name="idareas" class="form-control">
					@foreach ($areas as $area)
						<option value="{{$area->idareas}}">{{$area->detalle}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label >Oficina</label>
				<select name="idoficinas" class="form-control">
					@foreach ($oficinas as $oficina)
						<option value="{{$oficina->idoficinas}}">{{$oficina->detalle}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label >Impresora</label>
				<select name="idimpresoras" class="form-control">
					@foreach ($impresoras as $impresora)
						<option value="{{$impresora->idimpresoras}}">{{$impresora->ipimpresora}}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechaasignacion">Fecha Asignacion</label>
				<input type="text" name="fechaasignacion"  value="{{$asignacionimpresora->fechaasignacion}}" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
			{!!Form::close()!!}
	
@endsection	