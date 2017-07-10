@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Impresora: {{$impresora->ipimpresora}}</h3>
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
			{!!Form::model($impresora, ['method'=>'PATCH','route'=>['inven.impresora.update', $impresora->idimpresoras]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label >Modelo Impresora</label>
				<select name="idmodelo_impresoras" class="form-control">
					@foreach ($modeloimpresoras as $modeloimpresora)
						@if ($modeloimpresora->idmodelo_impresoras==$impresora->idmodelo_impresoras)
						<option value="{{$modeloimpresora->idmodelo_impresoras}}" selected>{{$modeloimpresora->detalle}}</option>
						@else
						<option value="{{$modeloimpresora->idmodelo_impresoras}}">{{$modeloimpresora->detalle}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="numeroserie">Numero Serie</label>
				<input type="text" name="numeroserie"  value="{{$impresora->numeroserie}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="ipimpresora">IP Impresora</label>
				<input type="text" name="ipimpresora"  value="{{$impresora->ipimpresora}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="macimpresora">MAC Impresora</label>
				<input type="text" name="macimpresora" value="{{$impresora->macimpresora}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fechacompra">Fecha Compra</label>
				<input type="text" name="fechacompra" value="{{$impresora->fechacompra}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observacion">Observacion</label>
				<input type="text" name="observacion" value="{{$impresora->observacion}}" class="form-control">
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