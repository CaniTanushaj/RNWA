<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'content' => 'required',
            'user_id' => 'required',
            'movie_id'=>'required'

        ]);
        comment::create([
            'content'=>$request['content'],
            'user_id'=>$request['user_id'],
            'movie_id'=>$request['movie_id']
        ]);
        $movie_id=$request['movie_id'];
         

        return redirect()->route('singleMovie',[$movie_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($movie_id,$comment_id)
    {
    $comment=Comment::find($comment_id)->delete();
        return redirect()->route('singleMovie',[$movie_id])

                        ->with('success','Comment deleted successfully');

    
    }
}
