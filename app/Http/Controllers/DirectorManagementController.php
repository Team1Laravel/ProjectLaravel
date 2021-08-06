<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class DirectorManagementController extends Controller
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
        $directors = Director::paginate(1);
        return view('admin.directors.index', compact('directors'));
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
        
        $new_director = new Director();
        $new_director->name = $request->name;
        $file_name = $request->image;
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been created fails!'
                    
                ));
            }
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName('image');
            $file->move(public_path('img/director'), $file_name);
            
            
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been created fails!'
                    
                ));
            }
        }
        
        $new_director->image = $file_name;
        $new_director->desc = $request->desc;
        $new_director->facebook = $request->facebook;
        $new_director->twitter = $request->twitter;
        $new_director->wiki = $request->wiki;
        $new_director->save();
        
        return response()->json(array(
            'success' => true,
            'message' => 'Record has been created successfully!'
            
        ));
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
        $director = Director::findOrFail($id);
        if ($director) {
            return response()->json(['data' => $director],200);
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
        $director = Director::findOrFail($id);
        $file_name = $request->hidden_image;
        
        
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been updated fails!'
                    
                ));
            }
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName('image');
            $file->move(public_path('img/director'), $file_name);
            
            
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been updated fails!'
                    
                ));
            }
        }
        
        $director->name = $request->name;
        $director->image = $file_name;
        $director->desc = $request->desc;
        $director->facebook = $request->facebook;
        $director->twitter = $request->twitter;
        $director->wiki = $request->wiki;
        $director->updated_at = Date::now();
        $director->update();
        return response()->json(array(
            'success' => true,
            'message' => 'Record has been updated successfully!'
            
        ));}
        
        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $director = Director::findOrFail($id);
            if ($director) {
                $director->delete();
                return response()->json(array(
                    'success' => true,
                    'message' => 'Record has been deleted successfully!'
                    
                ));
            }
            else{
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been updated fail!'
                    
                ));
            }
        }
}
