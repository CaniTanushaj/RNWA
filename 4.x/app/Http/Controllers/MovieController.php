<?php

namespace App\Http\Controllers;
use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

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
        $category = Category::all();
        return view('Movie.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->image){
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('/public/images/movies', $fileName);
        }
        $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'director' => 'required',
            'category_id'=>'required',
        ]);
        
        $movie=new Movie;
        $movie->title = $request->input('title');
        $movie->release_date = $request->input('release_date');
        $movie->director = $request->input('director');
        $movie->category_id = $request->input('category_id');
        if($request->is_series){
            $movie->is_series = 1;
            }
        if($request->image){
        $movie->image = $fileName;
        }
        $movie->save();

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
        $category=Category::all();
        return view('Movie.edit',compact('Movie','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        if($request->image){
            Storage::delete('public/images/movies/' . $movie->image);
        }
        if($request->image){
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('/public/images/movies', $fileName);
        }
        $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'director' => 'required',
            'category_id'=>'required',
        ]);
        $movie->title = $request->input('title');
        $movie->release_date = $request->input('release_date');
        $movie->director = $request->input('director');
        $movie->category_id = $request->input('category_id');
        if($request->is_series){
            $movie->is_series = 1;
            }
        if($request->image){
        $movie->image = $fileName;
        }
        $movie->save();

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $kopija=Movie::find($id);
        if($kopija->image){
            Storage::delete('public/images/movies/' . $kopija->image);
        }
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

    public function homepage()
    {
        $Movie = Movie::all();
        return view('Frontend.homepage',compact('Movie'));
    }

    public function allMovies()
    {
       
        $Movie = Movie::all()->where('is_series',0);
        return view('Frontend.homepage',compact('Movie'));
    }
    public function allSeries()
    {
        $Movie = Movie::all()->where('is_series',1);
        return view('Frontend.homepage',compact('Movie'));
    }

    public function singleMovie($id)
    {
        $Movie = Movie::find($id);
        return view('Frontend.singleMovie',compact('Movie'));
    }

    public function searchMovie(Request $request)
    {
         $Movie = Movie::where('title', 'like', '%'.$request->input('search').'%')->get();
        return view('Frontend.homepage',compact('Movie'));
    }



}
