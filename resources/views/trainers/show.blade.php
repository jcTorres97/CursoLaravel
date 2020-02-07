@extends('layouts.app')

@section('title', 'Trainer')

@section('content')
	<div class="text-center">
		<img class="card-img-top rounded-circle mx-auto display-block" style="height:200px; width:200px; background-color: #EFEFEF; margin: 20px;" src="/images/trainers/{{$trainer->avatar}}" alt="">
		<h5>{{$trainer->name}}</h5>
		<p>{{$trainer->description}}</p>
		<a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
		{!! Form::open(['route' => ['trainers.destroy', $trainer->slug], 'method' => 'DELETE']) !!}
			{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}		    	    	    
		{!! Form::close() !!}
	</div>
@endsection