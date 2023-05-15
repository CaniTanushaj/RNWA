<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie crud</title>
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
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Movie CRUD</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('movies.create') }}"> Create movie</a>
                    <a class="btn btn-success" href="{{ url('/movies.orderbyDate') }}"> Sort by date</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>movie title</th>
                    <th>movie release date</th>
                    <th>movie director</th>
                    <th>movie genre</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Movie as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->director }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td>
                            <form action="{{ route('movies.destroy',$movie->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('movies.edit',$movie->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{ route('movies.show',$movie->id) }}">Show</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>