<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit movie Form - Laravel 9 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit movie</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('movies.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('movies.update',$Movie) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')  
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>movie title:</strong>
                        <input type="text" name="title" value="{{ $Movie->title }}" class="form-control"
                            placeholder="movie title">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>movie release_date:</strong>
                        <input type="date" name="release_date" class="form-control" placeholder="movie release_date"
                            value="{{ $Movie->release_date }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>movie director:</strong>
                        <input type="text" name="director" value="{{ $Movie->director }}" class="form-control"
                            placeholder="movie director">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>movie genre:</strong>
                        <input type="text" name="genre" value="{{ $Movie->genre }}" class="form-control"
                            placeholder="genre">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>  
        </form>
    </div>
</body>

</html>