<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $report = DB::select("select * from V_Report")[0];
        return view('admin.dashboard', compact('report'));
    }
}
