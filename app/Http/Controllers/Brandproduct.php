<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Illuminate\support\Facades\Redirect;

class Brandproduct extends Controller
{
    public function all_brand(){

        $all_brand_product = DB::table('tbl_brand_product')->get();
        $maneger_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$maneger_brand_product);
    }
    public function add_brand(){
        return view('admin.add_brand_product');
    }
    public function save_brand_product(Request $request){

        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        
        //insert Data into mySQL 
        if($data['brand_name'] != null && $data['brand_desc'] !=null){
            DB::table('tbl_brand_product')->insert($data);
            Session::put('message','<span style="color:green; font-size:14px;display:flex;justify-content: center;">Add brand sucssecfully !!!</span>');
            return Redirect::to('/add-brand');
        }
        else{
            Session::put('message','<span style="color:red; font-size:14px;display:flex;justify-content: center;">Error: You do not have data to add !</span>');
            return Redirect::to('/add-brand');
        }
    }
    public function active_brand_product($brand_product_id){// sau khi click sẽ unactive
        $arr = DB::table('tbl_brand_product')->get('brand_name');
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status' => 0]);
        Session::put('message','<span style="color:#ff8f6b; font-size:14px;display:flex;justify-content: center;">Unctive Product Sucssecfully !!!</span>');
        return Redirect::to('all-brand');
    }
    public function unactive_brand_product($brand_product_id){//sau khi click sẽ active
        $arr = DB::table('tbl_brand_product')->get('brand_name');
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status' => 1]);
        Session::put('message','<span style="color:green; font-size:14px;display:flex;justify-content: center;">Active Product Sucssecfully !!!</span>');
        return Redirect::to('all-brand');
    }
    
    //edit update
    public function edit_brand_product($brand_product_id){
        $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();
        $maneger_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$maneger_brand_product);
    }
    public function update_brand_product(Request $request, $brand_product_id){

        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;

        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','<span style="color:green; font-size:14px;display:flex;justify-content: center;">Update Product Sucssecfully !!!</span>');
        return Redirect::to('all-brand');
    }
    public  function delete_brand_product($brand_product_id){
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','<span style="color:green; font-size:14px;display:flex;justify-content: center;">Delete Product Sucssecfully !!!</span>');
        return Redirect::to('all-brand');
    }
}
