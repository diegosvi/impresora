@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cartucho: {{$cartucho->codigointerno}}</h3>
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
			{!!Form::model($cartucho, ['method'=>'PATCH','route'=>['inven.cartucho.update', $cartucho->idcartuchos]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label >Modelo Cartucho</label>
				<select name="idmodelo_cartuchoss" class="form-control">
					@foreach ($modelocartuchos as $modelocartucho)
						@if ($modelocartucho->idmodelo_cartuchos==$cartucho->idmodelo_cartuchos)
						<option value="{{$modelocartucho->idmodelo_cartuchos}}" selected>{{$modelocartucho->detalle}}</option>
						@else
						<option value="{{$modelocartucho->idmodelo_cartuchos}}">{{$modelocartucho->detalle}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="codigointerno">Codigo Interno</label>
				<input type="text" name="codigointerno"  value="{{$cartucho->codigointerno}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadorinicialrecarga">IP Impresora</label>
				<input type="text" name="contadorinicialrecarga"  value="{{$cartucho->contadorinicialrecarga}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechacompra">Fecha Compra</label>
				<input type="text" name="fechacompra" value="{{$cartucho->fechacompra}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="numerofactura">MAC Impresora</label>
				<input type="text" name="numerofactura" value="{{$cartucho->numerofactura}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observacion">Observacion</label>
				<input type="text" name="observacion" value="{{$cartucho->observacion}}" class="form-control">
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