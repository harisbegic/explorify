@extends('layouts.nav')

@section('content')

	<center>
		<div class="container">
		<div class="col-md-4">
			<img src="https://www.vitalsignsdirect.co.uk/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/m/a/ma269_full_protective_suit_mandatory_sign.gif" height="160px" width="160px"><br>
			
			<h1>{{ $user->name }}</h1> <br>
			<h2 style="margin-top: -24px"><a class="btn btn-block btn-warning" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Hobbies({{ $number }})</a></h2>
			</div>
			<div class="collapse" id="collapseExample" style="margin-top: 20px">
			  <div class="card card-body">
			 <div class="row">
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
	</div>
			  </div>
			</div>
		</div>
	</center>
@stop