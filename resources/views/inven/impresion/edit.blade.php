@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Impresion</h3>
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
			{!!Form::model($impresion, ['method'=>'PATCH','route'=>['inven.impresion.update', $impresion->idimpresions]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label >Impresora</label>
				<select name="idimpresoras" class="form-control">
				@foreach ($impresoras as $impresora)
					@if ($impresora->idimpresoras==$impresion->idimpresoras)
						<option value="{{$impresora->idimpresoras}}" selected>{{$impresora->ipimpresora}}</option>
						@else
						<option value="{{$impresora->idimpresoras}}">{{$impresora->ipimpresora}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechainicioimpresion">Fecha Inicio Impresionion</label>
				<input type="text" name="fechainicioimpresion" required value="{{$impresion->fechainicioimpresion}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechafinimpresion">Fecha Fin Impresion</label>
				<input type="text" name="fechafinimpresion"  value="{{$impresion->fechafinimpresion}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadorinicioimpresion">Contador Inicio Impresion</label>
				<input type="text" name="contadorinicioimpresion" required value="{{$impresion->contadorinicioimpresion}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadorfinimpresion">Contador Fin Impresion</label>
				<input type="text" name="contadorfinimpresion" required value="{{$impresion->contadorfinimpresion}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="difconinifinimpresion">Diferencia Contador</label>
				<input type="text" name="difconinifinimpresion" required value="{{$impresion->difconinifinimpresion}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observacion">Observacion</label>
				<input type="text" name="observacion"  value="{{$impresion->observacion}}" class="form-control" placeholder="Observacion">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>


	</div>
		
			{{!!Form::close()!!}}
	
@endsection	