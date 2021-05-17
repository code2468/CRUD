<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta name="csrf-token" content="">

  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

	<body>
		<div class="container">
         
<!---------------NAVBAR------------------->
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('movies.index')}}">Movies</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{route('movies.create')}}">Add new</a></li>
    </ul>
  </div>
</nav>
   <div class="container">
		@yield('content')
  </div>
	</div>
	</body>

</html>
