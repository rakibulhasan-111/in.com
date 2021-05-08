@extends('layouts.app')


@section('content')
        
            
        

            <div class="content">
                <div class="title m-b-md">
                    sell
                </div>
            </div>
                <div class="wrapper create-product">
    <h1>Post a New Ad</h1>

    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h3>{{$name}}</h3>
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
    <input type="text" name="product_name" id="product_name" required>
    <br>
    <div class="control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
    <label for="image">Product Image:</label>
    <input type="file" class="form-control"name="image" id="image" required>
    </div>
    </div>
    <br>
    <label for="description">Product Description:</label>
    <input type="text" name="description" id="description" required>
    <br>
    <label for="price">Product Price:</label>
    <input type="text" name="price" id="price" required>
    <br>
    <label for="contact_number">Contact Number</label>
    <input type="text" name="contact_number" id="Contact Number" required>
    <br>
    <br>
    
    <input type="submit" value="Post your Ad">
  </form>
</div>
@endsection

