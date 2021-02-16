<?php

namespace App\Http\Controllers;
use App\Product;
use DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        //$product= DB::table('products')->get();
        //paginate
        $product= DB::table('products')->latest()->paginate(3);
        return view('product.index',compact('product'));
    }
    public function create(){
        return view('product.create');
    }
    public function store( Request $request){
       $data=array();
       $data['product_name']=$request->product_name;
       $data['product_code']=$request->product_code;
       $data['details']=$request->details;
        
       $image=$request->file('logo');
       if($image){
           $image_name= date('day_H_s_i');
           $ext = strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name. '.' .$ext;
           $upload_path='public/media/';
           $image_url=$upload_path.$image_full_name;
           $success= $image->move($upload_path,$image_full_name);

           $data['logo']=$image_url;
           $product=DB::table('products')->insert($data);
           return redirect()->route('product.index')->with('success',"Product created sucessfully");
       }
    }
       public function edit($id){
          $product=DB::table('products')->where('id',$id)->first();
          return view('product.edit',compact('product'));       
      
    }
    public function update( Request $request ,$id){
        $oldlogo=$request->old_logo;
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['details']=$request->details;
         
        $image=$request->file('logo');
        if($image){
           
            $image_name= date('day_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name. '.' .$ext;
            $upload_path='public/media/';
            $image_url=$upload_path.$image_full_name;
            $success= $image->move($upload_path,$image_full_name);
 
            $data['logo']=$image_url;
            $product=DB::table('products')->where('id',$id)->update($data);
            return redirect()->route('product.index')->with('success',"Product Update sucessfully");
        }
       
    }
    public function destroy($id){
        $data=DB::table('products')->where('id',$id)->first();
        $image=$data->logo;
      
        $product=DB::table('products')->where('id',$id)->delete();
        return redirect()->route('product.index')->with('success','Product Deleted Successfuly');
    }
    public function show($id){
        $data=DB::table('products')->where('id',$id)->first();
        return view('product.show',compact('data'));
    }
}
