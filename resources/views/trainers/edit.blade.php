@extends('layouts.app')

@section('title', 'Trainer Edit')

@section('content')
	<div class="container">
		{!! Form::model($trainer, ['route' => ['trainers.update', $trainer->slug], 'method' => 'PUT', 'files' => true ])!!}
			
	    	@include('trainers.form')
	    	
	    	
		    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

		    	
		{!! Form::close() !!}
	</div>
	
@endsection