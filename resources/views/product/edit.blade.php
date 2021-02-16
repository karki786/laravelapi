@extends('product.layout')
@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit product list</h2>
        </div>
        <div class='pull-right'>
            <a  class='btn btn-success'href=" {{ route('product.index')}}">Back </a>
        </div>
    </div>
    <form action="{{url('update/product/ ' . $product->id)}}" method='post' enctype='multipart/form-data'>
        @csrf
    <div class='col-xs-6 col-sm-6 col-md-6'>
        <div class='form-group'>
            <strong>Product Name:</strong>
            <input type="text" name='product_name' class='form-control' value="{{$product->product_name}}">
        </div>
    </div>
    <div class='col-xs-6 col-sm-6 col-md-6'>
        <div class='form-group'>
            <strong>Product code:</strong>
            <input type="text" name='product_code' class='form-control' value="{{$product->product_code}}"">
        </div>
    </div>
    <div class='col-xs-12 col-sm-12 col-md-12'>
        <div class='form-group'>
            <strong>Details:</strong>
            <textarea  class='form-control'name="details" style="height:150px" placeholder='details' >
            {{$product->details}}</textarea>
        </div>
    </div>
    <div class='col-xs-6 col-sm-6 col-md-6'>
        <div class='form-group'>
            <strong>Product Image</strong>
            <input type="file" name='logo'>
        </div>
        <div class='col-xs-6 col-sm-6 col-md-6'>
            <div class='form-group'>
                <strong>Product old Image</strong>
                <img src="{{URL::to($product->logo)}}" height="70px"; width="80px";>
                <input type="hidden" name='old_logo' value='{{$product->logo}}'>
            </div>
        <div class='col-xs-6 col-sm-6 col-md-6'>
           <button input type='submit' class='btn btn-primary'>Submit</button>
        </div>

</form>
@endsection