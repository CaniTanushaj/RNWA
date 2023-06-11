<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MovieController;
use App\Models\Movie;
use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cast = Cast::all();
        return view('Cast.index',compact('cast'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cast.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required',
            'actors_id' => 'required',
            'caracter_name' => 'required',
        ]);
        
        Cast::create($request->post());

        return redirect()->route('cast.index')->with('success','actor has been created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Cast $cast)
    {
        return view('Cast.edit',compact('cast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cast $cast)
    {
        return view('Cast.edit',compact('cast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cast $cast)
    {
        $request->validate([
            'movie_id' => 'required',
            'actors_id' => 'required',
            'caracter_name' => 'required',
        ]);
        $actor->update($request->all());

        return redirect()->route('cast.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cast=Cast::find($id)->delete();
        return redirect()->route('cast.index')->with('success','actor has been deleted successfully');
    
    }
}
