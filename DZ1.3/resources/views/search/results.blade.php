@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>

    @if ($results->isEmpty())
        <p>No results found.</p>
    @else
        <ul>
            @foreach ($results as $result)
                <li>{{ $result->title }}</li>
            @endforeach
        </ul>
    @endif
@endsection
