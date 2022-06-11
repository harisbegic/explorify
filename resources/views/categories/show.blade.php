@extends('layouts.nav')

@section('content')

	<h3 style="margin-left: 15px">Category: {{ $category->name }}</h3>

	@foreach($hobbies as $hobby)

		<div class="col-lg-4 col-sm-6 portfolio-item">
	          <div class="card h-100">
	            <a href="/hobbies/{{ $hobby->id }}"><img class="card-img-top" height="200px" width="350px" src="{{ asset('images/' . $hobby->image) }}" alt=""></a>
	            <div class="card-body">
	              <h4 class="card-title">
	                <a href="/hobbies/{{ $hobby->id }}">{{ $hobby->name }}</a>
	              </h4>
	              <p class="card-text">{{ str_limit($hobby->description, 120) }}</p>
	            </div>
	          </div>
	        </div>

	@endforeach

@stop