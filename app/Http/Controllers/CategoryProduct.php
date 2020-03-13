<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryProduct extends Controller
{
    public function all_category(){
        return view('admin.all-category-product');

    }
    public function add_category(){
        return view('admin.add-category-product');
    }
}
