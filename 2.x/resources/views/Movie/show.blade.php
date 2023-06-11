<!DOCTYPE html>
<html>
<head>
    <title>Movie App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body>
<div class="navbar">
		<div></div>
		<ul>
            <li><a href="{{ route('actors.index') }}">Actors</a></li>
			<li><a href="{{ route('movies.index') }}">Movies</a></li>
			<li><a href="{{ route('cast.index') }}">Cast</a></li>
		</ul>
</div>
<div class="container">


<h1>Showing {{ $Movie->title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $Movie->director }}</h2>
        <p>
            <strong>Release Date:</strong> {{ $Movie->release_date }}<br>
            <strong>Genre:</strong> {{ $Movie->genre }}<br>
             <strong>@foreach($Movie->cast as $cast)
                        Cast:</strong>{{$cast->actors->name}} as {{ $cast->caracter_name }},
                        @endforeach
        </p>
    </div>

</div>
</body>
</html>