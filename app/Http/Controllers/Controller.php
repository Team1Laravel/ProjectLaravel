<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Writer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    function fetch(Request $request)
    {
        if($request->ajax())
        {
            $table = $request->table;
            switch ($table){
                case 'director':
                    return (new DirectorManagementController)->index();
                case 'writer':
                    return (new WriterManagementController)->index();
                case 'user':
                    return (new UserManagementController)->index();
                case 'genre':
                    return  (new GenreManagementController)->index();
                case 'movie':
                    return (new MovieManagementController)->index();
            }
            
        }
    }
}
