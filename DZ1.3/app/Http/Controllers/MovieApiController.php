<?php

namespace App\Http\Controllers;
use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Http\Request;
use DB;

class MovieApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Movie = Movie::all();
        return $Movie;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Movie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'director' => 'required',
            'genre'=>'required',
        ]);
        $movie=Movie::create($request->post());
        

        return "Film stvoren";    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $Movie = Movie::find($id);
        return $Movie;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $Movie)
    {
        return view('Movie.edit',compact('Movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'director' => 'required',
            'genre' => 'required',
        ]);
        $movie->update($request->all());

        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie=Movie::find($id)->delete();
        return "Movie deleted";    
    }

    public function orderbyDate()
    {
       
        $Movie = Movie::all()->sortBy('release_date');

        return $Movie;
    }

   
}
