@extends('master')

@section('title', 'Sastojci')

@section('content')

@foreach($ingredient as $ingredient)
	{{ $ingredient }}
@endforeach

@endcontent