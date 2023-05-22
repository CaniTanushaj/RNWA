<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search operation
        $results = Movie::where('title', 'like', '%'.$query.'%')->get();

        return view('search.results', ['results' => $results]);
    }
}
