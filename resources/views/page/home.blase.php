@extends('templates.master')
 
@section('content')

	{{ Auth::user()->name }}

@stop