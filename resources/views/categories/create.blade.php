@extends('layouts.nav')

@section('content')

	<center>
@if (count($errors))
<div class="col-sm-12">
	<div class="col-sm-offset-3 col-sm-6">
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif

<form class="form-horizontal" method="POST" action="/categories" enctype="multipart/form-data">
{{ csrf_field() }}
	<div class="col-sm-offset-3">
	  <div class="form-group">
	    <div class="col-sm-5">
	      <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-5">
	      <input type="file" name="image" id="image" class="form-control" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-5">
	      <button type="submit" class="btn btn-outline-primary btn-block">Add</button>
	    </div>
	  </div>
	</div>
</form>

@stop