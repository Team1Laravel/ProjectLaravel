<?php

namespace App\Http\Controllers;

use App\Models\GenresMovies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index($id)
    {
        $packages = DB::select("select * from package where id = '" . $id . "'");
        if (count($packages) > 0) {
            $package = $packages[0];
            return view('payment', compact('package'));
        }
        return view('404');
    }
    

}
