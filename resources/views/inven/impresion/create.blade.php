@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Impresión</h3>
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
			{!!Form::open(array('url'=>'inven/impresion','method'=>'POST', 'autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
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
				<label for="fechainicioimpresion">Fecha Inicio Impresión</label>
				<input type="text" name="fechainicioimpresion" required value="{{old('fechainicioimpresion')}}" class="form-control" placeholder="Fecha Inicio Impresión">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechafinimpresion">Fecha Fin Impresión</label>
				<input type="text" name="fechafinimpresion"  value="{{old('fechafinimpresion')}}" class="form-control" placeholder="Fecha Fin Impresión">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadorinicioimpresion">Contador Inicio Impresión</label>
				<input type="text" name="contadorinicioimpresion" required value="{{old('contadorinicioimpresion')}}" class="form-control" placeholder="Contador Inicio Impresión">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadorfinimpresion">Contador Fin Impresión</label>
				<input type="text" name="contadorfinimpresion" required value="{{old('contadorfinimpresion')}}" class="form-control" placeholder="Contador Fin Impresión">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="difconinifinimpresion">Diferencia Contador</label>
				<input type="text" name="difconinifinimpresion"  value="{{old('difconinifinimpresion')}}" class="form-control" placeholder="Diferencia Contador">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observacion">Observación</label>
				<input type="text" name="observacion"  value="{{old('observacion')}}" class="form-control" placeholder="Observación">
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