<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use DB;

class ProductController extends Controller
{
    public function create() {
        $name = Auth::user()->name;
        
        return view('sell',['name' => $name]);
    }

    public function store() {

        $product = new Product();
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $product->email_address = $email;
        $product->user_name = $name;
        $product->product_name = request('product_name');
        $product->category_id = request('category_id');
        $product->image = request('image');
        $product->description = request('description');
        $product->price = request('price');
        $product->contact_number = request('contact_number');

        
    
        $product->save();
    
        return redirect('/')->with('mssg', 'Thanks for your order!');
    
    }

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
        //$product = Product::orderby('product_name','asc')->get();
        $product = Product::where('category_id',$cat)->latest()->get();
        return view('details', ['cat' => $cat, 'product'=>$product]);
    }

    public function sell(){
        return view('sell');
    }

    public function myadds(){
        $product = new Product();
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $product = Product::where('email_address',$email)->latest()->get();
        return view('myadds', ['user_name'=>$name,'product'=> $product]);
    }

    public function edit($id_number) {
        $product = Product::find($id_number); 
        return view ('edit',['product'=>$product,'id_number'=>$id_number]);
    }

    public function update( $id_number){
        $product = new Product();
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $product->email_address = $email;
        $product->user_name = $name;
        $product->product_name = request('product_name');
        $product->category_id = request('category_id');
        $product->image = request('image');
        $product->description = request('description');
        $product->price = request('price');
        $product->contact_number = request('contact_number');
        $product->save();
        $delete=DB::table('products')->where('id',$id_number)->delete();
        $product = Product::where('email_address',$email)->latest()->get();
        return view('/myadds', ['user_name'=>$name,'product'=> $product]);
    }

    public function destroy($user_id)
    {
        $product=new Product();
        $product=Product::findorFail($user_id);
        $product->delete();
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $product = Product::where('email_address',$email)->latest()->get();
        return view('/myadds', ['user_name'=>$name,'product'=> $product]);
    }
}
