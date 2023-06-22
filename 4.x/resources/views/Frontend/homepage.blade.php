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
<div class="navbar">
            <div class="row w-50 d-flex align-items-center justify-content-center">
            <div class="col-8">
            <form action="{{ route('homepage.searchMovie') }}" method="Post">
                @csrf
                <div classs="form-group" >
                <input type="text" id="search" name="search" placeholder="Search" class="form-control" />

            </div>
            </div>
            <div class="col-4 pb-2">
            <button type="submit" class="btn btn-primary mt-2 ml-3">Submit</button>
    </div>
    </form>

        </div>
		<ul>
        <li><a href="{{ route('homepage') }}">Home</a></li>
            <li><a href="{{ route('allMovies') }}">Movies</a></li>
			<li><a href="{{ route('allSeries') }}">Series</a></li>
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

    <div class="row mt-2 d-flex align-items-center justify-content-center">
    @foreach($Movie as $movie)
    

        <div class="col-3 m-2 row d-flex align-items-center justify-content-center ">
        <a href="{{ route('singleMovie',$movie->id) }}" class="link-dark">
        <div class="d-flex align-items-center justify-content-center">
        @if($movie->image!='test')
                                    <img src="{{ asset('storage/images/movies/'.$movie->image) }}" style="height: 400px;width:266px;">
                                    @else 
                                    <img src="{{ asset('images/default-movie.png') }}" class="img-fluid" style="height: 400px;width:266px;">

                                    @endif

                                    </div>
                                    
                                    <div class="d-flex align-items-center justify-content-center">
                                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            
           <p> @if($movie->is_series==1){{'*'}}@endif{{$movie->title}}</p>
         
            {{$movie->release_date}}
</a>
            </div>
            
        </div>
        
        @endforeach
        
</div>
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