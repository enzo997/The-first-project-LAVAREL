<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\support\Facades\Redirect;
class AdminController extends Controller
{
    public function index(){
       return view('admin_login');
    }
    public function show_Dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        $result=DB::table('tbl_admin')
                ->where('admin_email', $admin_email)
                ->where('admin_password', $admin_password)
                ->first();
                if ($result) {
                    Session::put('admin_name', $result->admin_name);
                    Session::put('admin_id', $result->admin_id);
                    return Redirect::to('/dashboard'); 
                } else {
                    Session::put('message', '<span style="color:red; font-size:15px;width:100%;margin-botom:-10px">Email or Password Invalid</span>');
                    return Redirect::to('/admin');
                }
        // $result=DB::table('tbl_admin')->get()->toArray();
        // $result=DB::table('tbl_admin')->get('admin_email');
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }
    public function logout(){
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }
}
