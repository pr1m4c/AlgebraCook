@extends('master')

@section('title', 'Recepti')

@section('content')

<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-defaut">
			<div class="panel-heading">Recepti<br>
				<a href="{{ url('recipes/add') }}">
				<i class="fa fa-btn fa-plus"></i>
				Dodaj novi recept</a>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					@foreach ($recipes as $recipe)
					<li class="list-group-item">
						<a href="/recipes/view/{{ $recipe->id }}">{{ $recipe->name }}</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>

@endsection