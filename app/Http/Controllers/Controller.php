<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Writer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Events\PaymentEvent;
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
    
    function payment(Request $request) {
        if(!Auth::check()){
            return redirect('/login');
        }
        if($request->ajax())
        {
            $data = $request->all();
            $payments = Payment::create($data);
            event(
                $e = new PaymentEvent($payments)
                );
        }
    }
}
