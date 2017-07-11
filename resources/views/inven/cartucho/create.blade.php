@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Cartucho</h3>
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
			{!!Form::open(array('url'=>'inven/cartucho','method'=>'POST', 'autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label >Modelo Cartucho</label>
				<select name="idmodelo_cartuchos" class="form-control">
					@foreach ($modelocartuchos as $modelocartucho)
						<option value="{{$modelocartucho->idmodelo_cartuchos}}">{{$modelocartucho->detalle}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="codigointerno">Codigo Interno</label>
				<input type="text" name="codigointerno" required value="{{old('codigointerno')}}" class="form-control" placeholder="Codigo Interno">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="contadorinicialrecarga">Contador Inicial Recarga</label>
				<input type="text" name="contadorinicialrecarga" required value="{{old('contadorinicialrecarga')}}" class="form-control" placeholder="Contador Inicial Recarga">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechacompra">Fecha Compra</label>
				<input type="text" name="fechacompra"  value="{{old('fechacompra')}}" class="form-control" placeholder="Fecha Compra">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="numerofactura">Numero Factura</label>
				<input type="text" name="numerofactura" required value="{{old('numerofactura')}}" class="form-control" placeholder="Numero Factura">
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