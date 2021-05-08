@extends('layouts.app')


@section('content')
       
            

            <div class="content">
                <div class="title m-b-md">
                    {{ $cat }}
                </div>

                <div class="links m-b-md">
                <a href="/buy" class="button button1">All</a>
                    <a href="/buy/Home Appliances" class="button button1">Home Appliances</a>
                    <a href="/buy/Question Banks" class="button button1">Question Banks</a>
                    <a href="/buy/Books" class="button button1">Books</a>
                    <a href="/buy/Notes" class="button button1">Notes</a>
                    <a href="/buy/Lab Equipments" class="button button1">Lab Equipments</a>
                    <a href="/buy/Music Instruments" class="button button1">Music Instruments</a>
                    <a href="/buy/Sports Instruments" class="button button1">Sports Instruments</a>
                </div>
            </div>
            @foreach($product as $item)
            
            <div class="wrapper">

                <div class="container">
                <img src="{{URL::to($item->image)}}" alt="Avatar" class="image">
                <div class="middle">
                <div class="text">
                    <h1>{{ $item->product_name }}</h1>
                    <h3>by {{ $item->user_name}}</h3>
                    <h4>Price : {{$item->price}}</h4>
                    <a href="{{ route('showSingleProduct', ['id_number'=>$item->id]) }}" class="button button1">View Details</a>
                </div>
                </div>
                </div>
    
                </div>
            
            @endforeach
            <div class="content">
                <div class="pagination">{{$product->links()}}</div>
                </div>
            
        
@endsection

