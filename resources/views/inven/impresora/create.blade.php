@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Impresora</h3>
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
			{!!Form::open(array('url'=>'inven/impresora','method'=>'POST', 'autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label >Modelo Impresora</label>
				<select name="idmodelo_impresoras" class="form-control">
					@foreach ($modeloimpresoras as $modeloimpresora)
						<option value="{{$modeloimpresora->idmodelo_impresoras}}">{{$modeloimpresora->detalle}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="numeroserie">Numero Serie</label>
				<input type="text" name="numeroserie" required value="{{old('numeroserie')}}" class="form-control" placeholder="Numero Serie">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="ipimpresora">IP Impresora</label>
				<input type="text" name="ipimpresora" required value="{{old('ipimpresora')}}" class="form-control" placeholder="IP">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="macimpresora">MAC Impresora</label>
				<input type="text" name="macimpresora" required value="{{old('macimpresora')}}" class="form-control" placeholder="MAC">
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