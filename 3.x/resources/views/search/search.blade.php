@extends('layouts.app')


@section('content')
    @include('search.form')

    @if (isset($results))
        @include('search.results')
    @endif
@endsection
