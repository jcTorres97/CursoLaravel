@extends('layouts.app')

@section('title', 'Trainers Create')

@section('content')
	<form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
		@csrf
		<div class="container">
			<div class="form-group">
		    	<label>Nombre</label>
		    	<input type="text" name="name" class="form-control"></input>
		    </div>
		    <div class="form-group">
		    	<label>Avatar</label>
		    	<input type="file" name="avatar"></input>
		    </div>
		    <button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
@endsection