@extends('layouts.app')


@section('content')
        
            <div class="content">
                <div class="title m-b-md">
                    buy
                </div>

                <div class="links m-b-md">
                <a href="/buy">All</a>
                    <a href="/buy/Home Appliances">Home Appliances</a>
                    <a href="/buy/Question Banks">Question Banks</a>
                    <a href="/buy/Books">Books</a>
                    <a href="/buy/Notes">Notes</a>
                    <a href="/buy/Lab Equipments">Lab Equipments</a>
                    <a href="/buy/Music Instruments">Music Instruments</a>
                    <a href="/buy/Sports Instruments">Sports Instruments</a>
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

