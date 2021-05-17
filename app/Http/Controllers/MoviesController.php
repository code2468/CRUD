<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class MoviesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $movies = Movie::latest()->paginate(4);
        return view('movies.index', compact('movies'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre=['Action','Comedy','Biopic','Horror','Drama'];
        return view('movies.create',compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $request->validate(['title'=>'required',
            'genre'=>'required',
        ]);*/

        $this->validate($request, [
    'title' => 'required',
    'genre' => 'required',
]);
        
        $data=new Movie;
        $data->title=$request->title;
        $data->genre=$request->genre;
        $data->release_year=$request->release_year;
        $data->save();
        return redirect()->route('movies.index')->with('success','Movie created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genre=['Action','Comedy','Biopic','Horror','Drama'];
        return view('movies.edit',compact('movie','genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        /*$request->validate([
            'title' => 'required',
            'genre' => 'required',
        ]);*/
        $this->validate($request, [
    'title' => 'required',
    'genre' => 'required',
]);

         $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->release_year = $request->release_year;
        $movie->update();
        return redirect()->route('movies.index')->with('success', 'Movie has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie has been deleted successfully.');
    }
}
