<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct(Array $movies)
    {
        $this->storeListToDb($movies);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }

    private function storeListToDb(Array $movies)
    {
        //Movie::truncate();

        foreach ($movies["results"] as $movie) {
            try {
                $temp = new Movie();
                $temp->title = $movie["title"] ?? ''; // UNDEFINED field in many movies
                $temp->movie_id = $movie["id"];
                $temp->backdrop_path = $movie["backdrop_path"];
                $temp->overview = $movie["overview"];
                $temp->popularity = $movie["popularity"];

                // dd($temp);
                $temp->save();
            } catch(QueryException $ex) {
                //dd($ex->getMessage());
            }
        }
    }

}
