<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Illuminate\support\Facades\Redirect;
class CategoryProduct extends Controller
{
    public function all_category(){

        $all_category_product = DB::table('tbl_category_product')->get();
        $maneger_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$maneger_category_product);
    }
    public function add_category(){
        return view('admin.add_category_product');
    }
    public function save_category_product(Request $request){

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        
        //insert Data into mySQL 
        if($data['category_name'] != null && $data['category_desc'] !=null){
            DB::table('tbl_category_product')->insert($data);
            Session::put('message','<span style="color:green; font-size:14px;display:flex;justify-content: center;">Add category sucssecfully !!!</span>');
            return Redirect::to('/add-category');
        }
        else{
            Session::put('message','<span style="color:red; font-size:14px;display:flex;justify-content: center;">Error: You do not have data to add !</span>');
            return Redirect::to('/add-category');
        }
    }
}
