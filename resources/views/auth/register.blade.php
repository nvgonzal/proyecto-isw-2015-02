@extends('master')

@section('titulo','Registrar empleado')

@section('contenido')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-success">
				<div class="panel-heading">Registrar cuenta</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Hay errores en tus entradas.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					{!! Form::open(['route'=>'auth.register.post','class'=>'form-horizontal ','method'=>'POST']) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							{!! Form::label('rut','Rut',['class'=>'col-md-4 control-label']) !!}
							<div class="col-md-6">
								<select class="form-control" id="rut" name="rut">
									@foreach(\App\Empleado::all() as $empleado)
										@if($empleado->id_cuenta==null)
											<option value="{{$empleado->rut}}">{{$empleado->nombres}} {{$empleado->apellido_paterno}}
												{{$empleado->apellido_materno}}</option>
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('password','Contraseña',['class'=>'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::password('password',['class'=>'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('password_confirmation','Confirme contraseña',['class'=>'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::password('password_confirmation',['class'=>'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop
