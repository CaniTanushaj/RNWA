<?php

namespace App\Http\Controllers;
use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Http\Request;
use DB;

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
        $movie=Movie::create($request->post());
        if($request->inputs[0]["actors_id"]!=NULL){
         foreach($request->inputs as $key=>$value){
           
            Cast::create([
                'movie_id'=>$movie->id,
                'actors_id'=>$value["actors_id"],
                'caracter_name'=>$value["caracter_name"],
            ]);

        }}


        

        return redirect()->route('movies.index')->with('success','Movie has been created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $Movie = Movie::find($id);
        return View('Movie.show',compact('Movie'));
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

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie=Movie::find($id)->delete();
        return redirect()->route('movies.index')->with('success','Movie has been deleted successfully');
    
    }

    public function orderbyDate()
    {
       
        $Movie = Movie::all()->sortBy('release_date');

        return view('Movie.index',compact('Movie'));
    }

    public function search(Request $request)
    {
         $Movie = Movie::where('title', 'like', '%'.$request->input('search').'%')->get();
        return view('Movie.index',compact('Movie'));
    }

    public function fetch(Request $request)
    {
        $data = [];
            $data = Movie::select("title")

                        ->where('title', 'LIKE', '%'. $request->get('query'). '%')

                        ->get();
        
                        $final = array();
                        foreach ($data as $dat)
                            {
                                $final[] = $dat->title;
                            }

        return response()->json($final);
    }
}
