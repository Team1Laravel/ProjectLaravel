<?php

namespace App\Http\Controllers;

use App\Models\GenresMovies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($name)
    {
        $movies = DB::select("select * from movies where name = '" . $name . "'");
        if (count($movies) > 0) {
            $movie = $movies[0];
            return view('detail', compact('movie'));
        }
        return view('404',);
    }

    public function update($name, Request $request){

    }
}
