@extends('master')

@section('title', 'Sastojci')

@section('content')

Ime ulogiranog korisnika: {{ Auth::user()->name }} <br>


@endsection