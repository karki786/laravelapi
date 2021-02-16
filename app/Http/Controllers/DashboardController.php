<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $product= DB::table('products')->latest()->paginate(3);
        return view('admin.dashboard',compact('product'));
    }
}
