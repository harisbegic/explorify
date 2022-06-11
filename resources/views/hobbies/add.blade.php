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

<form class="form-horizontal" method="POST" action="/hobbies" enctype="multipart/form-data">
{{ csrf_field() }}
	<div class="col-sm-offset-3">
	  <div class="form-group">
	    <div class="col-sm-5">
	      <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-5">
	      <select class="form-control" name="category" required>
	      <option selected="true" disabled>Select a category</option>
	      @foreach($categories as $category)
	      	<option value="{{ $category->id }}">{{ $category->name }}</option>
	      @endforeach
	      </select>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-5">
	      <input type="file" name="image" id="image" class="form-control" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-5">
	      <textarea class="form-control" rows="5" id="comment" name="description" placeholder="Information about your hobby" required></textarea>
	    </div>
	  </div>
	  <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-5">
	      <button type="submit" class="btn btn-outline-primary btn-block">Add</button>
	    </div>
	  </div>
	</div>
</form>

@stop