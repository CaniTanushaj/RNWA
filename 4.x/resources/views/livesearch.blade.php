<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <title>Movie crud</title>
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
                    <h2>Movie CRUD</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('movies.create') }}"> Create movie</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-group mb-2">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Movie name</th>
                                    <th>Director</th>
                                    <th>Genre</th>
                                    <th>Release Date</th>
                                    <th>Movie cast</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                    
                fetch_customer_data();

                function fetch_customer_data(query = '') {
                    $.ajax({
                        url: "{{ route('action') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('tbody').html(data.table_data);
                            $('#total_records').text(data.total_data);
                        }
                    })
                }

                $(document).on('keyup', '#search', function() {
                    var query = $(this).val();
                    fetch_customer_data(query);
                });
            });
        </script>
</body>

</html>