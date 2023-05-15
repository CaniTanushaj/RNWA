<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actors crud</title>
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
                    <h2>Actors CRUD</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('actors.create') }}"> Create Actors</a>
                    <a class="btn btn-success" href="{{ url('/actors.orderbyBirthDate') }}"> Sort by date</a>

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
                    <th>Actors name</th>
                    <th>Actors role</th>
                    <th>Actors birth date</th>
                    <th>Actors nationality</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actors as $Actors)
                    <tr>
                        <td>{{ $Actors->id }}</td>
                        <td>{{ $Actors->name }}</td>
                        <td>@foreach($Actors->cast as $cast)
                            {{$cast->caracter_name}}
                        @endforeach</td>
                        <td>{{ $Actors->birth_date }}</td>
                        <td>{{ $Actors->nationality }}</td>
                        <td>
                            <form action="{{ route('actors.destroy',$Actors->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('actors.edit',$Actors->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')  
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