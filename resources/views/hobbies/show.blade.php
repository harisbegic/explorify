@extends('layouts.nav')

@section('content')

<div class="row">
		<div class="col-sm-3">
		<img width="250px" height="210px" src="{{ asset('images/' . $hobby->image) }}"><br>
		</div>
		<div class="col-sm-9">
			<p style="font-size: 20px; font-color:black;"><strong>{{ $hobby->name }}</strong>
			</p>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Details</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Images</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Videos</a>
		  </li>
		</ul>
		<div class="tab-content" id="myTabContent" style="margin-top: 7px">
		  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		  	{{ $hobby->description }}
		  </div>
		  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			@foreach($hobbyphotos as $hobbyphoto)

				<a href="#" class="pop"><img width="140px" height="80px" src="{{ asset('photos/' . $hobbyphoto->image) }}">&nbsp;</a>
				<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">              
				      <div class="modal-body">
				      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        <img src="" class="imagepreview" style="width: 100%;" >
				      </div>
				    </div>
				  </div>
				</div>



			@endforeach
		  </div>
		  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
		  	 <iframe width="320" height="215" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe> 
		  </div>
		</div>
		</div>
</div>
<div class="col-sm-3" style="margin-left: -15px">
			<p style="font-size: 15px; margin-top: 10px">User: &nbsp;<a href="/users/{{ $hobby->user_id }}"><strong>{{ $hobby->user->name }}</strong></a></p>
			<p style="font-size: 15px; margin-top: -18px">Category: &nbsp;&nbsp;&nbsp;<strong>{{ $hobby->category->name }}</strong></p>

			@if($hobby->user_id == Auth::user()->id)
			<form action="/hobbies/upload" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
					<p style="font-size: 15px; margin-bottom: -1px">Upload image:</p>
					<input type="file" name="image" id="image" class="form-control" required>
					<input type="hidden" name="hobby_id" value="{{ $hobby->id }}">
					<input type="submit" style="margin-top: 2px" class="btn btn-outline-info btn-block" value="Upload">
			</form>
			@endif
</div>
<br>
<br>
<div class="row">
<div class="col-sm-6">
	<!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-block btn-outline-success btn-md" data-toggle="modal" data-target="#myModal">Questions & Answers</button><br>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      <form method="POST" action="/question/store">
        <div class="modal-body">
          <p>
			{{ csrf_field() }}
			<textarea name="content" class="form-control" placeholder="Ask a question..."></textarea>
			<input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
			<input type="hidden" name="hobby_id" class="form-control" value="{{ $hobby->id }}">
		
	</p>
        </div>
        <div class="modal-footer">
        	 <button class="btn btn-success" type="submit">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<div class="col-sm-6">
<!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-block btn-outline-success btn-md" data-toggle="modal" data-target="#myModal2">Suggestions</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      <form method="POST" action="/suggestion/store">
        <div class="modal-body">
          <p>
			{{ csrf_field() }}
			<textarea name="content" class="form-control" placeholder="Suggest something..."></textarea>
			<input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
			<input type="hidden" name="hobby_id" class="form-control" value="{{ $hobby->id }}">
		
	</p>
        </div>
        <div class="modal-footer">
        	 <button class="btn btn-success" type="submit">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<?php 
		$questions = App\Question::all()->where('hobby_id', '=', $hobby->id);
		?>
		<table class="table table-hover">
			@foreach ($questions as $question)
			<tr>
				<td>
					<div style="font-size: 20px">
						<b>{{ $question->user->name }}</b>:<br>
					</div>
				{{ $question->content }}<br>
					<div style="font-size: 11px; margin-top: 3px">
						Posted on: {{ $question->created_at }}
					</div>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
	<div class="col-sm-6">
		<?php 
		$suggestions = App\Suggestion::all()->where('hobby_id', '=', $hobby->id);
		?>
		<table class="table table-hover">
			@foreach ($suggestions as $suggestion)
			<tr>
				<td>
					<div style="font-size: 20px">
						<b>{{ $suggestion->user->name }}</b> said:<br>
					</div>
				{{ $suggestion->content }}<br>
					<div style="font-size: 11px; margin-top: 3px">
						Posted on: {{ $suggestion->created_at }}
					</div>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
<script>
   $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});
</script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
@stop
	