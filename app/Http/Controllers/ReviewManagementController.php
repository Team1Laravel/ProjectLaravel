<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ChuyenGiaDanhGia;
use Illuminate\Support\Facades\Validator;
use App\Models\Movie;

class ReviewManagementController extends Controller
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
        $title = 'Expert review';
        $movies = Movie::all();
        $chuyen_gia_danh_gia = ChuyenGiaDanhGia::paginate(8);
        return view('admin.reviews.index', [
            'chuyen_gia_danh_gia' => $chuyen_gia_danh_gia,
            'title' => $title,
            'movies'=> $movies]);
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
        $new_chuyen_gia_danh_gia = new ChuyenGiaDanhGia();
        $new_chuyen_gia_danh_gia->name = $request->name;
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
            $file->move(public_path('img/reviewers'), $file_name);


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
        $new_chuyen_gia_danh_gia->image = $file_name;
        $new_chuyen_gia_danh_gia->movie_id = $request->movie_id;
        $new_chuyen_gia_danh_gia->point = $request->point;
        $new_chuyen_gia_danh_gia->comment = $request->comment;
        $new_chuyen_gia_danh_gia->save();

        return response()->json(['message' => 'Record has been insert successfully!']);
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
        $chuyen_gia_danh_gia = ChuyenGiaDanhGia::findOrFail($id);
        if ($chuyen_gia_danh_gia) {
            return response()->json(['data' => $chuyen_gia_danh_gia, 200]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chuyen_gia_danh_gia = ChuyenGiaDanhGia::findOrFail($id);
        if ($chuyen_gia_danh_gia) {
            $chuyen_gia_danh_gia->delete();
            return response()->json([
                'message' => 'Record has been deleted successfully!',
            ], 200);
        }
    }
}
