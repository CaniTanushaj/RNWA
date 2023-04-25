<?php

namespace App\Http\Controllers;
use App\Models\Cast;
use App\Models\Actors;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Actors::all();
        return view('Actors.index',compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Actors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'required',
            'nationality' => 'required',
        ]);
        
        Actors::create($request->post());

        return redirect()->route('actors.index')->with('success','actor has been created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Actors $actors)
    {
        return view('Actors.edit',compact('actors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actors $actor)
    {
        return view('Actors.edit',compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actors $actor)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'required',
            'nationality' => 'required',
        ]);
        $actor->update($request->all());

        return redirect()->route('actors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $actors=Actors::find($id)->delete();
        return redirect()->route('actors.index')->with('success','actor has been deleted successfully');
    
    }
}
