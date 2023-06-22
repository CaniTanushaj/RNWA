<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add movie Form - Laravel 9 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

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
                <div class="pull-left mb-2">
                    <h2>Add movie</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('movies.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>movie title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="movie title">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>movie release date:</strong>
                        <input type="date" name="release_date" class="form-control" placeholder="movie release date">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>movie director:</strong>
                        <input type="text" name="director" class="form-control" placeholder="movie director">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>movie image:</strong>
                        <input type="file" name="image" class="form-control">
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Series?:</strong>
                        <input type="checkbox" name="is_series" value="true">
                 </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>movie genre: 
    
    </strong></br>
<label for="category"></label>
<select name="category_id" id="pet-select">
    <option value="">--Please choose an option--</option>
    @foreach($category as $cat)
    
    <option value="{{$cat->id}}">{{$cat->name}}</option>
    @endforeach
</select>

                </div>
                    
                    
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                </div>
                
            <div class="container mt-2">
            <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add cast</h2>
                </div>
                
                 </div>
                 </div>
                </div>

               <table class="table table-bordered" id="table">
               <tr>
                    <th>Actors Name</th>
                    <th>Caracter Name</th>
                    <th>Action</th>
                </tr>
                <tr>
                <td><input type="number" name="inputs[0][actors_id]" class="form-control" placeholder="actors_id">
                <td><input type="text" name="inputs[0][caracter_name]" class="form-control" placeholder="caracter_name">
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button>

            </tr>
                <table>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </form>
        
    </div>

    <script>
            var i = 0;
        $('#add').click(function(){
            ++i;
            $('#table').append(
                `
                <tr>
                    <td>
                    <input type="number" name="inputs[`+i+`][actors_id]" class="form-control" placeholder="actors_id">
                    </td>
                    <td>
                    <input type="text" name="inputs[`+i+`][caracter_name]" class="form-control" placeholder="caracter_name">
                    </td>
                    <td>
                    <button type="button" class="btn btn-danger remove-table-row">Remove</button>
                    </td>
                </tr>
                    `
            );
        })
        $(document).on('click','.remove-table-row',function(){
            $(this).parents('tr').remove();
        });
    </script>
</body>

</html>