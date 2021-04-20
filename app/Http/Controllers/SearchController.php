<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Sentinel;

class SearchController extends Controller
{
    function search(Request $request){

        $category = $request->category; 
        $text = $request->text;

        if ($category == null) {
            
            $listProducts = DB::table('products')
            ->where('name','REGEXP',$text)
            ->paginate(9);
        }else{
            
            $listProducts = DB::table('products')
            ->Where('category_id','=',$category)
            ->where('name','REGEXP',$text)
            ->paginate(9);
        }
        return view('search',['list' => $listProducts,'category' => $category, 'text' => $text]);
    }
}
