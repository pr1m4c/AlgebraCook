@extends('master')

@section('title', 'Sastojci')

@section('content')

@foreach($ingredients as $ingredient)
	{{ $ingredient->name }}
@endforeach

@endsection