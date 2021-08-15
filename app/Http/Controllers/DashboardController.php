<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $movies = DB::select('SELECT year, count(1) count FROM movies group by year');
        $listmovies = [];
        $year = Carbon::now()->format("Y") - 10;

        for ($i = 0; $i <= 9; $i++) {
            $flag = false;
            $year++;
            for ($j = 0; $j < sizeof($movies); $j++) {
                if ($movies[$j]->year == $year) {
                    array_push($listmovies, ['year' => $movies[$j]->year, 'count' => $movies[$j]->count]);
                    $flag = true;
                    break;
                }
            }
            if (!$flag) {
                array_push($listmovies, ['year' => $year, 'count' => 0]);
            }
        }

        $users = DB::select('SELECT month(created_at) month, count(1) count FROM `users` where role_id = 2 group by month');

        $listusers = [];
        $month = Carbon::now()->format("m") - 6;

        for ($i = 0; $i <= 5; $i++) {
            $flag = false;
            $month++;
            for ($j = 0; $j < sizeof($users); $j++) {
                if ($users[$j]->month == $month) {
                    array_push($listusers, ['month' => $users[$j]->month, 'count' => $users[$j]->count]);
                    $flag = true;
                    break;
                }
            }
            if (!$flag) {
                array_push($listusers, ['month' => $month, 'count' => 0]);
            }
        }

        $allUsers = User::all()->where("role_id", "=", 2);
        $subscribeUsers = $allUsers->where("isSubcribe", "=", "1");
        $listsubscribes = ["allUsers" => count($allUsers), "allSubs" => count($subscribeUsers)];
        $revenue = DB::select('SELECT sum(b.price) as sum, month(a.created_at) as month FROM payment a join package b on a.package_id = b.id where a.status = 2 group by month(a.created_at) order by month desc limit 6');
        $total = 0;
        foreach ($revenue as $item) {
            $total += $item->sum;
            $item->sum = round($item->sum);
        }
        $total = round($total);
        return view('admin.dashboard', compact('listmovies', 'listusers', 'listsubscribes', 'revenue', 'total'));
    }
}
