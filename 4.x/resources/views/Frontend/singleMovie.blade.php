<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie crud</title>
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


</head>
<body>
<div class="navbar w-100">
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
        
</div>

<div class="row w-100">
    <div class="h1 m-4">{{$Movie->title}}</div>
<div style="height: 30rem;" class="col-8 d-flex justify-content-center">
<iframe width="700rem" height="400rem" src="https://www.youtube.com/embed/1bQv57_olHI">
</iframe>

</div>
<div class="col-2 d-flex  justify-content-center">
        @if($Movie->image!='test')
                                    <img src="{{ asset('storage/images/movies/'.$Movie->image) }}" style="height: 400px;width:266px;">
                                    @else 
                                    <img src="{{ asset('images/default-movie.png') }}" class="img-fluid" style="height: 400px;width:266px;">

                                    @endif

                                    </div>
                                   


</div>


</body>