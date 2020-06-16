<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\URL;

class productController extends Controller
{
    public function index()
    {
    	return view('AdminPages.add_product');
    }

    public function save_product(Request $request)
    {

        $this -> validate($request,[
            'product_image' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


    	$data=array();
        $data['category_id'] = $request->category_id;
    	$data['product_name'] = $request->product_name;
    	$data['product_size'] = $request->product_size;
    	$data['product_price'] = $request->product_price;
    	$data['product_quantity'] = $request->product_quantity;
    	$data['product_color'] = $request->product_color;
    	$data['product_short_description'] = $request->product_short_description;
    	$data['product_long_description'] = $request->product_long_description;
    	$data['publication_status'] = $request->publication_status;


        $image=$request->file('product_image');
        if ($image) {
          $image_name=str_random(20);
          $ext=mb_strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name.'.'.$ext;
          $upload_path='images/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);
          if($success)
          {
            $data['product_image']=$image_url;

                DB::table('tbl_product')->insert($data);
                Session::put('message','Product Add Successfully');
                return Redirect::back()->with('message','Product Add Successfully');
          }
        }
        else
        {
            $data['product_image'] = "";
            DB::table('tbl_product')->insert($data);
            return Redirect::back()->with('message','Product Add Auccessfully Without Image');
        }
    }


    public function view_product()
    {
        $all_product = DB::table('tbl_product')->get();
    	return view('AdminPages.view_product',['all_product' => $all_product]);
    }


    public function delete_product($product_id)
    {
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        return Redirect::back()->with('message','Product Delete Successfully');
    }

    public function edit_product($product_id)
    {
        return view('AdminPages.edit_product');
    }

    public function update_product(Request $request , $product_id)
    {
        $this -> validate($request,[
            'product_image' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $data=array();
        $data['category_id'] = $request->category_id;
        $data['product_name'] = $request->product_name;
        $data['product_size'] = $request->product_size;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_color'] = $request->product_color;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['publication_status'] = $request->publication_status;


        $image=$request->file('product_image');
        if ($image) {
          $image_name=str_random(20);
          $ext=mb_strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name.'.'.$ext;
          $upload_path='images/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);
          if($success)
          {
            $data['product_image']=$image_url;

                DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                Session::put('message','Product Updated Successfully');
                return Redirect::back()->with('message','Product Add Successfully');
          }
        }
        else
        {
            $data['product_image'] = "";
            DB::table('tbl_product')-where('product_id',$product_id)->update($data);
            return Redirect::back()->with('message','Product Updated Successfully Without Image');
        }
    }

    public function unactive_product($product_id)
    {
         DB::table('tbl_product')->where('product_id',$product_id)->update(['publication_status'=> 0]);
        return Redirect::to('view-product')->with('message','Category Unactive Successfully');
    }

    public function active_product($product_id)
    {
        DB::table('tbl_product')->where('product_id',$product_id)->update(['publication_status'=>1]);
        return Redirect::to('view-product')->with('message','Category Active Successfully');
    }


}
