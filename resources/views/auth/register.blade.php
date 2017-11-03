@extends('master')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registracija</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
						{!! csrf_field() !!}
						<!-- Stvaranje obrazaca za upis -->
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Ime: </label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">E-mail: </label>
							<input type="email" class="form-control" name="email" value="{{ old('email') }}">
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Lozinka: </label>
							<input type="password" class="form-control" name="password">
						</div>

						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Potvrda lozinke: </label>
							<input type="password" class="form-control" name="password_confirmation">
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-user"></i>Registracija
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection