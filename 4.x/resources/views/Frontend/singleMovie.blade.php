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



<form action="{{ route('comment.store',$Movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row m-3">
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Write a comment:</strong>
                        <input class="form-control input-lg" type="text" name="content" class="form-control" placeholder="">
                        @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endif
                        <input type="hidden" name="movie_id" value="{{$Movie->id}}">
                        
                    </div>  
                </div>
</div>

            @if(Route::has('login'))
            @auth
                <button type="submit" class="btn btn-outline-dark m-3">Submit</button>
           @endauth
           @else
           <a class="m-3"  href="{{ route('login') }}"> Log in to write a comment!</a>
                @endif
            
        </form>
    @foreach($Movie->comment as $comment)
   <div class="row p-2 m-3 border border-2 rounded" > 
    <div class="col-md-6">
   <b>{{$comment->user->name}}:</b></br>
   {{$comment->content}}
   </div>
   <div class="col-md-6 ">
   @if (Route::has('login'))
            @auth
        @if($comment->user->id==Auth::user()->id ||$post->user->id==Auth::user()->id )
   <form action="{{ route('comment.destroy',[$Movie->id,$comment->id]) }}" method="Post">
            @csrf
        @method('DELETE')  
        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-dark btn-sm float-right">Delete</button>
    </form>
    @endauth
                            @endif
                             @endif
   </div>
   </div>
    @endforeach
    


</body>