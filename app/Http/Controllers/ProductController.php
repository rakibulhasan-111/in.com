<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

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
        
        $product = Product::latest()->paginate(10);
        return view('buy', ['product'=>$product]);
    }

    public function show($cat){
        $product = Product::where('category_id',$cat)->latest()->paginate(10);
        return view('details', ['cat' => $cat, 'product'=>$product]);
    }

    public function sell(){
        return view('sell');
    }

    public function myadds(){
        $product = new Product();
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $product = Product::where('email_address',$email)->latest()->paginate(10);
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
        
        //return view('/myadds', ['user_name'=>$name,'product'=> $product]);
        return back();
    }

    public function destroy($user_id)
    {
        $post=DB::table('products')->where('id',$user_id)->first();
        $image=$post->image;
        $product=new Product();
        $product=Product::findorFail($user_id);
        $product->delete();
        unlink($image);
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $product = Product::where('email_address',$email)->latest()->get();
        //return view('/myadds', ['user_name'=>$name,'product'=> $product]);
        return back();
    }

    public function showSingleProduct($id_number)
    {
        $favorite=new Favorite();
        $product = Product::findorFail($id_number);
        $id = Auth::id();
        $favorite = Favorite::where('product_id',$id_number)->where('user_id',$id)->first();
        return view('/showSingleProduct',['item'=>$product,'favorite'=>$favorite]);
    }

    public function addFavorite($id_number){
        $favorite=new Favorite();
        $favorite->product_id=$id_number;
        $favorite->user_id=Auth::id();
        $favorite->save();
        $product = Product::findorFail($id_number);
        return back();
    }
    public function myfavorites()
    {
        $id = Auth::id();
        $favoriteProductId=DB::table('favorites')
        ->where('user_id', '=', $id)
        ->pluck('product_id');
        $product = Product::latest()->paginate(5);
        return view('/trial',['favorite'=>$favoriteProductId,'product'=>$product]);
    }
    public function removeFromFavorite($favorite_id)
    {
        $id = Auth::id();
        $favorite=new Favorite();
        $favorite=Favorite::where('product_id',$favorite_id)->where('user_id',$id)->first();
        $favorite->delete();
        $product = Product::latest()->get();
        $favoriteProductId=DB::table('favorites')
        ->where('user_id', '=', $id)
        ->pluck('product_id');
        return back();
    }
}
