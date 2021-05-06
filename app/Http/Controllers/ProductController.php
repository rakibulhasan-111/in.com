<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create() {
        $name = Auth::user()->name;
        
        return view('sell',['name' => $name]);
    }

    public function store(Request $request) {
      
        $email = Auth::user()->email;
        $name = Auth::user()->name;
       $data=array();
       $data['user_name']=$name;
       $data['email_address']=$email;
       $data['product_name']=$request->product_name;
       $data['category_id']=$request->category_id;
       $data['description']=$request->description;
       //image
       $image=$request->file('image');
       $image_name=Str::random(5);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/img/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       $data['image']=$image_url;
       //image
       $data['price']=$request->price;
       $data['contact_number']=$request->contact_number;
       Product::insert($data);
         return view('welcome')->with('mssg', 'Thanks for your order!');
      
        }

    public function index(){
        return view('welcome');
    }

    public function cat(){
        //$product = Product::latest();
        $product = Product::orderby('product_name','asc')->paginate(2);
        return view('buy', ['product'=>$product]);
    }

    public function show($cat){
        //$product = Product::latest();
        //$product = Product::orderby('product_name','asc')->get();
        $product = Product::where('category_id',$cat)->latest()->paginate(2);
        return view('details', ['cat' => $cat, 'product'=>$product]);
    }

    public function sell(){
        return view('sell');
    }

    public function myadds(){
        $product = new Product();
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $product = Product::where('email_address',$email)->latest()->paginate(2);
        return view('myadds', ['user_name'=>$name,'product'=> $product]);
    }

    public function edit($id_number) {
        $product = Product::find($id_number); 
        return view ('edit',['product'=>$product,'id_number'=>$id_number]);
    }

    public function update( Request $request,$id_number){
        $email = Auth::user()->email;
        $name = Auth::user()->name;
       $data=array();
       $data['user_name']=$name;
       $data['email_address']=$email;
       $data['product_name']=$request->product_name;
       $data['category_id']=$request->category_id;
       $data['description']=$request->description;
       
       //image
       $image=$request->file('image');
       if ($image){
        $image_name=Str::random(5);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/img/';
        $image=$request->file('image');
        $image_url=$upload_path.$image_full_name;  
        $success=$image->move($upload_path,$image_full_name);
        @unlink($request->old_photo);
        $data['image']=$image_url;
  }
  else{
    $data['image']=$request->old_photo;}
      //image
       $data['price']=$request->price;
       $data['contact_number']=$request->contact_number;
       Product::where('id',$id_number)->update($data);
        $product = Product::where('email_address',$email)->latest()->get();
      
        return view('/products/myadds', ['user_name'=>$name,'product'=> $product]);
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
