<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use Illuminate\support\Facades\Redirect;

class ProductController extends Controller
{
    public function all_product(){

        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $maneger_product = view('admin.all_product')->with('all_product',$all_product);
        // dd($all_product);
        return view('admin_layout')->with('admin.all_product',$maneger_product);
    }
    public function add_product(){
        $category_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        return view('admin.add_product')->with('category_product',$category_product)->with('brand_product',$brand_product);
    }
    // sau khi add sản phẩm sẽ save lại
    public function save_product(Request $request){

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->category_product;
        $data['brand_id'] = $request->brand_product;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));//hàm phân tách chuỗi khi gặp dấu chấm.
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();//nối tên+số random+đuôi.jpg or....
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','<span style="color:green; font-size:14px;display:flex;justify-content: center;">Add product sucssecfully !!!</span>');
            return Redirect::to('/add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','<span style="color:green; font-size:14px;display:flex;justify-content: center;">Add product sucssecfully !!!</span>');
        return Redirect::to('/add-product');
    }
    public function active_product($product_id){// sau khi click sẽ unactive
        $arr = DB::table('tbl_product')->get('product_name');
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' => 0]);
        Session::put('message','<span style="color:#ff8f6b; font-size:14px;display:flex;justify-content: center;">Unctive Product Sucssecfully !!!</span>');
        return Redirect::to('all-product');
    }
    public function unactive_product($product_id){//sau khi click sẽ active
        $arr = DB::table('tbl_category_product')->get('category_name');
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' => 1]);
        Session::put('message','<span style="color:green; font-size:14px;display:flex;justify-content: center;">Active Product Sucssecfully !!!</span>');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $category_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $maneger_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('category_product',$category_product)
        ->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$maneger_product);
    }
    public function update_category_product(Request $request, $category_product_id){

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','<span style="color:green; font-size:14px;display:flex;justify-content: center;">Update Product Sucssecfully !!!</span>');
        return Redirect::to('all-category');
    }
    public function delete_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','<span style="color:green; font-size:14px;display:flex;justify-content: center;">Delete Product Sucssecfully !!!</span>');
        return Redirect::to('all-category');
    }
}
