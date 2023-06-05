<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actors crud</title>
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <h2>Actors CRUD</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('actors.create') }}"> Create actor</a>
                    <a class="btn btn-success" href="{{ url('/actors.orderbyBirthDate') }}"> Sort by date</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div classs="form-group" >
        <form action="{{ route('actors.search') }}" method="Post">
            @csrf
            <div classs="form-group" >
            <input type="text" id="search" name="search" placeholder="Search" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
</form>        </div>


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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


    <script type="text/javascript">
        var path = "{{ route('actors.fetch') }}";

  

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
</html>