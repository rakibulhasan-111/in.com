@extends('layouts.app')


@section('content')
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="title m-b-md">
                    buy
                </div>

                <div class="links">
                <a href="/buy">All</a>
                    <a href="/buy/Home Appliances">Home Appliances</a>
                    <a href="/buy/Question Banks">Question Banks</a>
                    <a href="/buy/Books">Books</a>
                    <a href="/buy/Notes">Notes</a>
                    <a href="/buy/Lab Equipments">Lab Equipments</a>
                    <a href="/buy/Music Instruments">Music Instruments</a>
                    <a href="/buy/Sports Instruments">Sports Instruments</a>
                </div>

                @foreach($product as $item)
                
                <div class="wrapper product-details">
                    <h1>{{ $item->product_name }}</h1>
                    <h3>by {{ $item->user_name}}</h3>
                    <p class="description">{{$item->description}}</p>
                    <p class="price">Price : {{$item->price}}</p>
                    <p class="contact">Contact Number : {{$item->contact_number}}</p>


                </div>
                
                @endforeach

                <h1>Nothing is here for now!</h1>
            </div>
        </div>
@endsection

