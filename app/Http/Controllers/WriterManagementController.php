<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Writer;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class WriterManagementController extends Controller
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
        $writers = Writer::paginate(1);
        return view('admin.writers.index', compact('writers'));
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
        $new_writer = new Writer();
        $new_writer->name = $request->name;
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
            $file->move(public_path('img/writers'), $file_name);


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

        $new_writer->image = $file_name;
        $new_writer->desc = $request->desc;
        $new_writer->facebook = $request->facebook;
        $new_writer->twitter = $request->twitter;
        $new_writer->wiki = $request->wiki;
        $new_writer->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $writer = Writer::findOrFail($id);
        if ($writer) {
            return response()->json(['data' => $writer, 200]);
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
        $writer = Writer::findOrFail($id);
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
            $file->move(public_path('img/writers'), $file_name);


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

        $writer->name = $request->name;
        $writer->image = $file_name;
        $writer->desc = $request->desc;
        $writer->facebook = $request->facebook;
        $writer->twitter = $request->twitter;
        $writer->wiki = $request->wiki;
        $writer->updated_at = Date::now();
        $writer->update();
        return response()->json(array(
            'success' => true,
            'message' => 'Record has been updated successfully!'
            
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $writer = Writer::findOrFail($id);
        if ($writer) {
            $writer->delete();
            return response()->json(array(
                'success' => true,
                'message' => 'Record has been deleted successfully!'
                
            ));
        }
        else {
            return response()->json(array(
                'success' => true,
                'message' => 'Record has been deleted fail!'
                
            ));
        }
    }
}
