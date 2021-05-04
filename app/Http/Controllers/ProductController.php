<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function cat(){
        //$product = Product::latest();
        $product = Product::orderby('product_name','asc')->get();
        return view('buy', ['product'=>$product]);
    }

    public function show($cat){
        //$product = Product::latest();
        $product = Product::orderby('product_name','asc')->get();
        return view('details', ['cat' => $cat, 'product'=>$product]);
    }

    public function sell(){
        return view('sell');
    }

    public function myadds(){
        return view('myadds');
    }
}
