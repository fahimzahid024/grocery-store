<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use App\Http\Controllers\Controller;





session_start();

class categoryController extends Controller
{
    public function index()
    {
    	return view('AdminPages.add_category');
    }
    public function save_category(Request $request)
    {
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_category')->insert($data);
	    Session::put('message', 'Category add successfully (:');
	    return Redirect::to('/add-category');
    }
    public function view_category()
    {
    	$all_category = DB::table('tbl_category')->get();
		return view('AdminPages.view_category',['all_category'=>$all_category]);

    }
    public function delete_category($category_id)
    {
    	DB::table('tbl_category')->where('category_id',$category_id)->delete();
    	return Redirect::back()->with('message','Category Delete Successfully !');
    }
    public function edit_category($category_id)
    {
    	$edit_category = array();
    	$edit_category = DB::table('tbl_category')->where('category_id',$category_id)->get();
    	return view('AdminPages.edit_category',['edit_category'=>$edit_category]);
    }

    public function update_category(Request $request , $category_id)
    {
    	$data=array();
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;
    	$data['publication_status']=$request->publication_status;

    	DB::table('tbl_category')->where('category_id',$category_id)->update($data);
    	return Redirect::to('view-category')->with('message','Category Update Successfully');
    }

    public function unactive_category($category_id)
    {
    	$data=array();
    	$data = DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>0]);
    	return Redirect::to('view-category')->with('message','Category Unactive Successfully');

    }
    public function active_category($category_id)
    {
    	$data = array();
    	$data = DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>1]);
    	return Redirect::to('view-category')->with('message','Category Active Successfully');
    }

}
