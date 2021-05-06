@extends('movies.layout')
@section('content')
<div class="container">

  
  @if($messge = Session::get('success'))
<div class="alert alert-success text-center">{{ $messge }}</div>
@endif


  <table class="table table-bordered">
    <thead>
      <tr>
        
        <th>Title</th>
        <th>Genre</th>
        <th>Release Year</th>
        <th></th>
      </tr>
    </thead>
 @if($movies)

    <tbody>
      @foreach($movies as $movie )
      <tr>
        
        <td>{{$movie->title}}</td>
        <td>{{$movie->genre}}</td>
        <td>{{$movie->release_year}}</td>
         <td>
          <form action="{{route('movies.destroy',$movie->id)}}" method="post">
           <a href="{{route('movies.show',$movie->id)}}" class="btn btn-info">SHOW</a>
           <a href="{{route('movies.edit',$movie->id)}}" class="btn btn-primary">EDIT</a>
            {!! method_field('delete') !!}
            {!! csrf_field() !!}
           <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</button>
         </form>
         </td>
      </tr>
      @endforeach
    </tbody>

    @endif
  </table>
  <div class="d-flex">
    <div class="mx-auto">
        {{ $movies->links() }}
    </div>
</div>
</div>
@endsection