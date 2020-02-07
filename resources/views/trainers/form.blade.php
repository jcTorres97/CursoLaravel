<div class="form-group">

	{!! Form::label('name', 'Nombre') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>
<div class="form-group">

	{!! Form::label('description', 'Descripción') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' =>5, 'style' => 'resize:none']) !!}

</div>
<div class="form-group">

	{!! Form::label('avatar', 'Avatar') !!}
	{!! Form::file('avatar', ['accept' => 'image/x-png,image/jpeg']) !!}
	@if($trainer ?? '')
		<img class="card-img-top rounded-circle mx-auto display-block" style="height:50px; width:50px; background-color: #EFEFEF;" src="/images/trainers/{{$trainer->avatar}}" alt="">	
	@endif

</div>
