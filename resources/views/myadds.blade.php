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
            <div class="box">
        @foreach($product as $item)
                
                <div class="wrapper">
                <div class="card">
                <img src="{{URL::to($item->image)}}" alt="Avatar" style="width:100%">
                
                    <h1>{{ $item->product_name }}</h1>
                    <h3>by {{ $item->user_name}}</h3>
                    <p class="price">Price : {{$item->price}}</p>
                    <a href="{{ route('showSingleProduct', ['id_number'=>$item->id]) }}" class="button button1">View Details</a>
                    <?php $id_number=$item->id?>
                    <a href="{{ route('edit', ['id_number'=>$id_number]) }}" class="button button2">Edit</a>
                    <a href="{{route('delete', ['id_number'=>$id_number])}}" class="button button3">Delete</a>
                
                </div>
    
                </div>
                
        @endforeach
        </div>
                    
    
                

                <div class="content">
                <div class="pagination">{{$product->links('pagination::bootstrap-4')}}</div>
                </div>
                
            

        
@endsection

