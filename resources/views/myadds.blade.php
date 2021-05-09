@extends('layouts.app')


@section('content')
        
            
            <div class="content">

                <div class="title m-b-md">
                    My Ads
                </div>

                <div class="links m-b-md">
                    <a href="/" class="button button1">Home</a>
                    
                    <a href="{{route('myfavorites')}}" class="button button1">My Favourites</a>

                    <a href="/about" class="button button1">Edit Profile</a>
                </div>
            </div>
                @foreach($product as $item)
                
                <div class="wrapper">

                <div class="container">
                <img src="{{URL::to($item->image)}}" alt="Avatar" class="image">
                <div class="middle">
                <div class="text">
                    <h1>{{ $item->product_name }}</h1>
                    <h4>Price : {{$item->price}}</h4>
                    
                    <a href="{{ route('showSingleProduct', ['id_number'=>$item->id]) }}" class="button button1">View Details</a>
                </div>
                </div>
                </div>
                    <?php $id_number=$item->id?>
                    <a href="{{ route('edit', ['id_number'=>$id_number]) }}" class="btn btn-sm btn-success">Edit</a>
                    <a href="{{route('delete', ['id_number'=>$id_number])}}" class="btn btn-sm btn-danger">Delete</a>
    
                </div>
                
                @endforeach

                <div class="content">
                <div class="pagination">{{$product->links('pagination::bootstrap-4')}}</div>
                </div>
                
            

        
@endsection

