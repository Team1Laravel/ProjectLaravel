<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class GenreManagementController extends Controller
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
        $genres = Genre::paginate(1);
        return view('admin.genres.index', compact('genres'));
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
        $new_genre = new Genre();
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string','max:50', 'unique:genres'],
        ]);
        if($validator->fails())
        {
            return response()->json(array(
                'success' => false,
                'message' => 'Record has been created fail!'
                
            ));
        }
            $new_genre->name = $request->name;
             $new_genre->save();
            return response()->json(array(
                'success' => true,
                'message' => 'Record has been created successfully!'
                
            ));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        if ($genre) {
            return response()->json(['data' => $genre, 200]);
        }
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
        $request->validate([
            'name' => 'required']);
        $genre = Genre::findOrFail($id);
        $genre->name = request('name');
        $check = $genre->update();
        if($check){
            return response()->json(array(
                'success' => true,
                'message' => 'Record has been updated successfully!'
                
            ));
        }else {
            return response()->json(array(
                'success' => false,
                'message' => 'Record has been updated fail!'
                
            ));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        if ($genre) {
            $check=$genre->delete();
            if($check){
                return response()->json(array(
                    'success' => true,
                    'message' => 'Record has been deleted successfully!'
                    
                ));
            }else {
                return response()->json(array(
                    'success' => false,
                    'message' => 'Record has been deleted fail!'
                    
                ));
            }
        }
    }
}
