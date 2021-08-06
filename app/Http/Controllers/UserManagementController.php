<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(1);
        return view('admin.users.index', compact('users'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $roles = Role::all();
            return response()->json(['data' => $user, 'roles' => $roles], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $file_name = $request->hidden_image;


        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'image' => 'mimes:jpeg,bmp,png,PNG' // Only allow .jpg, .bmp and .png file types.
            ]);
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been updated fail!'
                    
                ));
            }
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName('image');
            $file->move(public_path('img/users'), $file_name);

            $user->updated_at = Date::now();

        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            ]);
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been updated fail!'
                    
                ));
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        
        $user->update();
        return response()->json(array(
            'success' => true,
            'message' => 'Record has been updated successfully!'
            
        ));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();
            return response()->json(array(
                'success' => true,
                'message' => 'Record has been deleted successfully!'
                
            ));
        }
        else{
            return response()->json(array(
                'success' => false,
                'message' => 'Record has been deleted fail!'
                
            ));
        }
    }
}
