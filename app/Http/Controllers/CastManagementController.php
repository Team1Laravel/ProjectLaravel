<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Cast;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;
use App\Models\Movie;

class CastManagementController extends Controller
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
        $title = 'Casts';
        $casts = Cast::paginate(8);
        $movies = Movie::all();
        return view('admin.casts.index',
            ['casts' => $casts,
                'title' => $title,
                'movies' => $movies
            ]);
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
        $new_cast = new Cast();
        $new_cast->name = $request->name;


        $file_name = $request->image;
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'messages' => $validator->errors()
                ]);
            }
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName('image');
            $file->move(public_path('img/cast'), $file_name);


        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'messages' => $validator->errors()
                ], 422);
            }
        }

        $new_cast->image = $file_name;
        $new_cast->birth = $request->birth;
        $new_cast->nation = $request->nation;
        $new_cast->facebook = $request->facebook;
        $new_cast->twitter = $request->twitter;
        $new_cast->wiki = $request->wiki;
        $new_cast->detail = $request->detail;
        $new_cast->save();

        return response()->json(['message' => 'Record has been created successfully!']);
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
        $cast = Cast::findOrFail($id);
        if ($cast) {
            return response()->json(['data' => $cast],200);
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
        $cast = Cast::findOrFail($id);
        $file_name = $request->hidden_image;


        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'messages' => $validator->errors()
                ]);
            }
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName('image');
            $file->move(public_path('img/cast'), $file_name);


        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'messages' => $validator->errors()
                ], 422);
            }
        }
        $cast->name = $request->name;
        $cast->image = $file_name;
        $cast->birth = $request->birth;
        $cast->nation = $request->nation;
        $cast->facebook = $request->facebook;
        $cast->twitter = $request->twitter;
        $cast->wiki = $request->wiki;
        $cast->detail = $request->detail;
        $cast->update();
        return response()->json(['message' => 'Record has been updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cast = Cast::findOrFail($id);
        if ($cast) {
            $cast->delete();
            return response()->json([
                'message' => 'Record has been deleted successfully!',
            ], 200);
        }
    }
}
