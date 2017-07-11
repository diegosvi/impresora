@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Recarga Cartucho</h3>
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
			{!!Form::open(array('url'=>'inven/recargacartucho','method'=>'POST', 'autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label >Cartucho</label>
				<select name="idcartuchos" class="form-control">
					@foreach ($cartuchos as $cartucho)
						<option value="{{$cartucho->idcartuchos}}">{{$cartucho->codigointerno}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="numerorecarga">Numero Recarga</label>
				<input type="text" name="numerorecarga" required value="{{old('numerorecarga')}}" class="form-control" placeholder="Numero Recarga">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechainiciorecarga">Fecha Inicio Recarga</label>
				<input type="text" name="fechainiciorecarga" required value="{{old('fechainiciorecarga')}}" class="form-control" placeholder="Fecha Inicio Recarga">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechafinrecarga">Fecha Fin Recarga</label>
				<input type="text" name="fechafinrecarga"  value="{{old('fechafinrecarga')}}" class="form-control" placeholder="Fecha Fin Recarga">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadoriniciorecarga">Contador Inicio Recarga</label>
				<input type="text" name="contadoriniciorecarga" required value="{{old('contadoriniciorecarga')}}" class="form-control" placeholder="Contador Inicio Recarga">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadorfinrecarga">Contador Fin Recarga</label>
				<input type="text" name="contadorfinrecarga" required value="{{old('contadorfinrecarga')}}" class="form-control" placeholder="Contador Fin Recarga">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="difcontinifinrecarga">Diferencia Contador</label>
				<input type="text" name="difcontinifinrecarga" required value="{{old('difcontinifinrecarga')}}" class="form-control" placeholder="Diferencia Contador">
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