@extends('master-no-nav')

@section('titulo','Restablecer contraseña')

@section('contenido')
	<div class="container-fluid" style="margin-top: 30px">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Reset Password</div>
					<div class="panel-body">
						@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> Hay errores en tus datos.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						{!! Form::open(['route'=>'password.email','method'=>'POST']) !!}
							<div class="form-group">
								{!! Form::label('email','Direccion de correo',['class'=>'control-label']) !!}
								{!! Form::email('email',null,['class'=>'form-control']) !!}
							</div>
							<div class="form-group">
								{!! Form::submit('Restablecer contraseña',['class'=>'btn btn-success']) !!}
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
