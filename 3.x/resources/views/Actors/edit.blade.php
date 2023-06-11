<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit actor Form - Laravel 9 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                    <h2>Edit actor</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('actors.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('actors.update',$actor) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')  
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>actor title:</strong>
                        <input type="text" name="name" value="{{ $actor->name }}" class="form-control"
                            placeholder="actor name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>actor release_date:</strong>
                        <input type="date" name="birth_date" class="form-control" placeholder="actor birth_date"
                            value="{{ $actor->birth_date }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>actor nationality:</strong>
                        <input type="text" name="nationality" value="{{ $actor->nationality }}" class="form-control"
                            placeholder="actor nationality">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>  
        </form>
    </div>
</body>

</html>