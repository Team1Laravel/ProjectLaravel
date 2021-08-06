<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewMovie;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $lmovies = DB::select("select * from genres_movies where name = '".$name."'");
        if(sizeof($lmovies) > 0){
            $sql = 'select * from movies where id in (';
            for ($i=0; $i < sizeof($lmovies); $i++) { 
                $sql .= $lmovies[$i]->movie_id;
                if($i < sizeof($lmovies) - 1){
                    $sql .= ',';
                }
            }
            $sql .= ')';
        }
        
        $movies = DB::select($sql);
        
        return view('home.moviebycategory', compact('movies', 'name'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
