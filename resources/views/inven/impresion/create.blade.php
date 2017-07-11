@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Impresion</h3>
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
				<label for="fechainicioimpresion">Fecha Inicio Impresionion</label>
				<input type="text" name="fechainicioimpresion" required value="{{old('fechainicioimpresion')}}" class="form-control" placeholder="Fecha Inicio Impresionion">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechafinimpresion">Fecha Fin Impresion</label>
				<input type="text" name="fechafinimpresion"  value="{{old('fechafinimpresion')}}" class="form-control" placeholder="Fecha Fin Impresion">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadorinicioimpresion">Contador Inicio Impresion</label>
				<input type="text" name="contadorinicioimpresion" required value="{{old('contadorinicioimpresion')}}" class="form-control" placeholder="Contador Inicio Impresion">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadorfinimpresion">Contador Fin Impresion</label>
				<input type="text" name="contadorfinimpresion" required value="{{old('contadorfinimpresion')}}" class="form-control" placeholder="Contador Fin Impresion">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="difconinifinimpresion">Diferencia Contador</label>
				<input type="text" name="difconinifinimpresion" required value="{{old('difconinifinimpresion')}}" class="form-control" placeholder="Diferencia Contador">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observacion">Observacion</label>
				<input type="text" name="observacion"  value="{{old('observacion')}}" class="form-control" placeholder="Observacion">
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