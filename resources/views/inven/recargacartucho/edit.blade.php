@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Recarga Cartucho: {{$recargacartucho->numerorecarga}}</h3>
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
			{!!Form::model($recargacartucho, ['method'=>'PATCH','route'=>['inven.recargacartucho.update', $recargacartucho->idrecarga_cartuchos]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label >Cartucho</label>
				<select name="idcartuchos" class="form-control">
					@foreach ($cartuchos as $cartucho)
						@if ($cartucho->idcartuchos==$recargacartucho->idcartuchos)
						<option value="{{$cartucho->idcartuchos}}" selected>{{$cartucho->codigointerno}}</option>
						@else
						<option value="{{$cartucho->idcartuchos}}">{{$cartucho->codigointerno}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="numerorecarga">Numero Recarga</label>
				<input type="text" name="numerorecarga"  value="{{$recargacartucho->numerorecarga}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechainiciorecarga">Fecha Inicio Recarga</label>
				<input type="text" name="fechainiciorecarga"  value="{{$recargacartucho->fechainiciorecarga}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechafinrecarga">Fecha Fin Recarga</label>
				<input type="text" name="fechafinrecarga" value="{{$recargacartucho->fechafinrecarga}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadoriniciorecarga">Contador Inicio Recarga</label>
				<input type="text" name="contadoriniciorecarga" value="{{$recargacartucho->contadoriniciorecarga}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadorfinrecarga">Contador Fin Recarga</label>
				<input type="text" name="contadorfinrecarga" value="{{$recargacartucho->contadorfinrecarga}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="difcontinifinrecarga">Diferencia Contador</label>
				<input type="text" name="difcontinifinrecarga" value="{{$recargacartucho->difcontinifinrecarga}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observacion">Observacion</label>
				<input type="text" name="observacion" value="{{$recargacartucho->observacion}}" class="form-control">
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