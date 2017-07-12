@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Asignacion de Cartuchos</h3>
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
			{!!Form::open(array('url'=>'inven/asignacioncartucho','method'=>'POST', 'autocomplete'=>'off'))!!}
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
				<label for="fechaasignacion">Fecha Asignacion</label>
				<input type="text" name="fechaasignacion"  value="{{old('fechaasignacion')}}" class="form-control" placeholder="Fecha Asignacion">
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