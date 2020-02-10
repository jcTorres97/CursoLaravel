@extends('layouts.app')

@section('title', 'Trainer Create')

@section('content')
	<div class="container">
		
		@include('common.errors')

		{!! Form::open(['route' => 'trainers.store', 'method' => 'POST', 'files' => true]) !!}
		    
	    	@include('trainers.form')

		    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
		    	    	    
		{!! Form::close() !!}
	</div>

@endsection