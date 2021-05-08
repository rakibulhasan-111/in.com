@extends('layouts.app')


@section('content')
<div class="wrapper create-product">
  <h1>Update Your Ad</h1>
  
  <form action="{{ route('update', ['id_number'=>$id_number]) }}" method="POST" enctype="multipart/form-data">
    @csrf
   
    <br>
    <label for="category_id">Choose Your Category:</label>
    <select name="category_id" id="category_id">
      <option value="Home appliances">Home Appliances</option>
      <option value="Question banks">Question Banks</option>
      <option value="Books">Books</option>
      <option value="Music instruments">Music Instruments</option>
      <option value="Sports instruments">Sports Instruments</option>
      <option value="Lab equipments">Lab Equipments</option>
      <option value="Notes">Notes</option>
    </select>
    <br>
    <label for="product_name">Product name:</label>
    
    <input type="text" value="{{$product->product_name}}" name="product_name" id="product_name"  required>
    <br>
    <div class="control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
    <label for="image">Upload New Image: </label>
    <input type="file"  value="{{URL('$product->image')}}" class="form-control" name="image" id="image"   >
    <input type="hidden" name="old_photo" value="{{ $product->image }}"
    <br>
    Old Image: <img src="{{URL::to($product->image)}}" style="height: 160px;width: 320px;">
    
    <br>
    </div>
    </div>
    <br>
    <label for="description">Product Description:</label>
    <input type="text"  value="{{$product->description}}" name="description" id="description" required>
    <br>
    <label for="price">Product Price:</label>
    <input type="text" value="{{$product->price}}" name="price" id="price" required>
    <br>
    <label for="contact_number">Contact Number</label>
    <input type="text" value="{{$product->contact_number}}" name="contact_number" id="Contact Number" required>
    <br>
    <br>
    
    <input type="submit" value="Update">
    <a href="/myadds" class="button button1">Confirm</a>
  </form>
</div>
@endsection