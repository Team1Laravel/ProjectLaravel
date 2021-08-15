<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function create(){
        // views: category/create.blade.php
        return view('category.create');
    }
    function store(Request $req){
        // nháº­n data tá»« form client
        $macn = $req->code;
        $tencn = $req->name;
        // lÆ°u vÃ o báº£ng category
        $ketqua = DB::insert('insert into categories(code, name) values (?,?)',[$macn, $tencn]);
        // thÃ´ng bÃ¡o
        
        //var_dump($list);
        if($ketqua){
            // tráº£ vá»� 1 chá»©c nÄƒng khÃ¡c hoáº·c Ä‘iá»�u hÆ°á»›ng sang 1 route khÃ¡c
            // Ä‘iá»�u hÆ°á»›ng theo uri
            //return redirect('/category');
            // Ä‘iá»�u hÆ°á»›ng dá»±a vÃ o name cá»§a route
            return redirect()->route('category')->with('message','ThÃªm má»›i thÃ nh cÃ´ng');;
        } else
            echo "<h1>Them moi that bai</h1>";
    }
    function index(){
        // lay du lieu tu categories
        // lay data tu bang:
        $list = DB::select('select * from categories');
        // tra lai view de hien thi danh sach category
        return view('category.index', compact('list'));
    }
    
    function edit($id){
        // lay record theo id
        $chuyennganh = DB::table('categories')->find($id);
        // tra ve giao dien cung record vua tim duoc
        if(!empty($chuyennganh)){
            return view('category.edit', compact('chuyennganh'));
        } else {
            echo "<h1>Category not found</h1>";
        }
    }
    function update(Request $request){
        // validate server
        // nháº­n data tá»« form client
        $id = $request->id;
        $macn = $request->code;
        $tencn = $request->name;
        // cap nhat vÃ o báº£ng category
        $result = DB::table('categories')
        ->where('id', $id)
        ->update(["code"=>$macn, "name"=>$tencn]);
        
        if ($result){
            // Ä‘iá»�u hÆ°á»›ng tráº£ vá»� trang danh sÃ¡ch chuyÃªn ngÃ nh
            // truyá»�n Ä‘i biáº¿n flash session: chá»‰ tá»“n táº¡i theo request/ response
            return redirect()->route('category')->with('message','Cáº­p nháº­t thÃ nh cÃ´ng');
        } else {
            return redirect('/category/'.$id.'/edit')->with('message','Cáº­p nháº­t khÃ´ng thÃ nh cÃ´ng');
        }
    }
    function destroy(Request $request){
        $id = $request->id;
        // xoa thang
        $result = DB::table('categories')->delete($id);
        if ($result){
            return "success";
        } else {
            return "fail";
        }
    }
    
    
    
    
    
    
    
    
    
}
