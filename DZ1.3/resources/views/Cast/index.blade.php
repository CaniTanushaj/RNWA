<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cast crud</title>
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
            @if (Route::has('login'))
      @auth
      <li >
      <a href="{{ route('login') }}">{{ Auth::user()->name }}</a>
      </li>
      @else
      <li >
      <a  href="{{ route('login') }}">Log in</a>
      </li>
      <li >
      <a  href="{{ route('register') }}">Register</a>
      </li>
    @endauth
    @auth
    <li><form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                
                <button class="m-0 p-1 btn btn-danger"  type="submit">Log out</button>
            </form>
    
    

            @if ($message = Session::get('success'))


    @endauth


@endif
@endif
        
        
        
        </ul>
	</div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Cast CRUD</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('cast.create') }}"> Create cast</a>
                </div>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <form method="GET" >
            <div class="pull-left">
                <input type="text" name="query" class="form-control form-control-lg" style="height: 50px;" placeholder="Search..." />
            </div>
            <div class="pull-right mb-2 mt-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Caracter Name</th>
                    <th>Movie name</th>
                    <th>Actor name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
           
                @foreach($cast as $cast)
                    <tr>
                        <td>{{ $cast->id }}</td>
                        <td>{{ $cast->caracter_name }}</td>
                        <td>{{ $cast->movie->title}}</td>
                        <td>{{ $cast->actors->name}}</td>
                        <td>
                            <form action="{{ route('cast.destroy',$cast->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('cast.edit',$cast->id) }}">Edit</a>
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