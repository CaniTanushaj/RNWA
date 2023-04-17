<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Movie = Movie::all();
        return view('Movie.index',compact('Movie'));
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
        
        Movie::create($request->post());

        return redirect()->route('movies.index')->with('success','Movie has been created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $Movie)
    {
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
    public function update(Request $request, Movie $movie): RedirectResponse

    {

        $request->validate([

            'title' => 'required',
            'release_date' => 'required',
            'director' => 'required',
            'genre' => 'required',

        ]);

        $movie->update($request->all());
        return "pusi kurac";

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie=Movie::find($id)->delete();
        return redirect()->route('movies.index')->with('success','Company has been deleted successfully');
    
    }
}
