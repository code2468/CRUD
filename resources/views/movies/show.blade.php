@extends('movies.layout')
@section('content')
<div class="a">

<div class="container">
	@if($movie)
	<div class="row pb-5">
		<div class="col-4"></div>
		<div class="col-4">
			<center>
			<div class="card" style="width: 22rem;">
  
  <div class="card-body">
    <h2 class="card-title">Title :  {{$movie->title}}</h2>
    <p class="card-text">{{$movie->genre}} | {{$movie->release_year}}</p>
    
  </div>
</div></center>
		</div>
		<div class="col-4"></div>
	</div>
	@endif
	</div>
</div>
@endsection