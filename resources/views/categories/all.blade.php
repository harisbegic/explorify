@extends('layouts.nav')

@section('content')
<div class="container">
	<div class="row">
	@foreach($categories as $category)
	        <div class="col-lg-4 col-sm-6 portfolio-item">
	          <div class="card h-100">
	            <a href="/categories/{{ $category->id }}"><img class="card-img-top" height="200px" width="350px" src="{{ asset('images/' . $category->image) }}" alt=""></a>
	            <div class="card-body">
	              <h4 class="card-title">
	                <a style="color: #545659 
	                " href="#">{{ $category->name }}</a>
	              </h4>
	            </div>
	          </div>
	        </div>
	@endforeach
	</div>
	<div class="row">
		<ul class="pagination justify-content-center"> 
			{{ $categories->links() }}
		</ul>
	</div>
</div>

@stop