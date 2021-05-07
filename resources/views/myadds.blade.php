@extends('layouts.app')


@section('content')
        
            
            <div class="content">

                <div class="title m-b-md">
                    {{$user_name}}
                </div>

                <div class="links m-b-md">
                <a href="/buy">All</a>
                <a href="/buy">Buy</a>
                    <a href="/sell">Sell</a>
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
    
                </div>
                
                @endforeach

                <div class="content">
                <div class="pagination">{{$product->links()}}</div>
                </div>
                
            

        
@endsection

