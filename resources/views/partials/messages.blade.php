@if (Session::has('success'))

	<div class='alert alert-success' role="alert">
		<strong>Success!</strong> {{ Session::get('success') }}
	</div>

@endif
@if (Session::has('danger'))

	<div class='alert alert-danger' role="alert">
		<strong>Ooops!</strong> {{ Session::get('danger') }}
	</div>

@endif

@if (count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong> 
		<ul>
			@foreach($errors as $error)	
				<li> {{ $error }} </li>
			@endforeach
		</ul>
	</div>

@endif