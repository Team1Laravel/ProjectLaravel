<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use Carbon\Traits\Date;
use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('profile',compact('roles'));
    }
    

    
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        
        if ($request->hasFile('image')) {
            $validated= $request->validate([
                'image' => 'mimes:jpeg,bmp,png,PNG'
            ]);
          
            $file = $request->file("image");
            $file_name = $file->getClientOriginalName('image');
            $user->image = url('/').'/img/users/'.$file_name;
            $storedPath = $file->move(public_path().'\\img\\users', $file_name);
            // dd(url('/').'/images/'.$storedPath->getFilename());
           
        }

            $validated= $request->validate([
                'name' => 'required',
            ]);
            if(!empty($request->password))
            {
                $validated= $request->validate([
                    'password' => 'min:8' // Only allow .jpg, .bmp and .png file types.
                ]);
                $user->password =Hash::make($request->password);
            }

        
        
        $user->name = $request->name;
  
        $user->update();
        return  redirect('profile')->with('message','Cập nhật thành công');
        
        
    }
}
