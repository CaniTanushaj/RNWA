<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <title>Add movie Form - Laravel 9 CRUD</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
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
                        <strong>movie genre:</strong>
                        <input type="text" name="genre" class="form-control" placeholder="movie genre">
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

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Actor</strong>
                        <input type="number" name="actors_id" class="form-control" placeholder="actors_id">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Caracter Name</strong>
                        <input type="text" name="caracter_name" class="form-control" placeholder="caracter_name">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
            
        </form>
        
    </div>
</body>

</html>