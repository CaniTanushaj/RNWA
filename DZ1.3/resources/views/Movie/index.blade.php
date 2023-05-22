<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie crud</title>
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="jquery-3.6.4.min.js"></script>
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

            <div class="pull-left mb-2">
            <body>
    
            <div classs="form-group" >
            <input type="text" id="search" name="search" placeholder="Search" class="form-control" />
        </div>
    </div>
    
            

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>movie title</th>
                    <th>movie cast</th>
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
                        <td>@foreach($movie->cast as $cast)
                        {{ $cast->caracter_name }},
                        @endforeach</td>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


    <script type="text/javascript">
        var path = "{{ route('movie.fetch') }}";

  

$('#search').typeahead({

    source: function (query, process) {

        return $.get(path, {

            query: query

        }, function (data) {

            return process(data);

        });

    }

});



    </script>


</body>
</html>