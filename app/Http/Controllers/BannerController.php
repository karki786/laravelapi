<?php

namespace App\Http\Controllers;
use App\Banner;

use Illuminate\Http\Request;

class BannerController extends Controller
{
  public function index(){
      return view('banner.index');
  }
  public function store( Request $request){
    $banner=Banner::create([
     'email'=>$request->email,
   'password'=>bcrypt('password')
]);
    //  $banner = new Banner();
    //  $banner->email=$request->input('email');
    //  $banner->password=$request->input('password');
    //  $banner->save();
     return redirect('/banner/create')->with('insert data');
  }
}
