@extends('layouts.app')


@section('content')
            <div class="content">

                <div class="title m-b-md">
                    My Favourites
                </div>

                <div class="links m-b-md">
                    <a href="/" class="button button1">Home</a>

                    <a href="/myadds" class="button button1">My Ads</a>

                    <a href="/about" class="button button1">Edit Profile</a>
                </div>
            </div>

        <div class="wrapper">
        @foreach($product as $item)
            @foreach($favorite as $n)   
                @if($item->id==$n)
                <div class="wrapper product-details">
                    <h1>{{ $item->product_name }}</h1>
                    <h3>by {{ $item->user_name}}</h3>
                    <h1>Category : {{$item->category_id}}</h1>
                    <img src="{{URL::to($item->image)}}">
                    <p class="description">{{$item->description}}</p>
                    <p class="price">Price : {{$item->price}}</p>
                    <p class="contact">Contact Number : {{$item->contact_number}}</p>
                    <a href="{{ route('removeFromFavorite', ['favorite_id'=>$item->id]) }}" class="button button1">Remove From Favourites</a>
                    <a href="/buy/{{$item->category_id}}" class="button button1">Go to {{$item->category_id}} page</a>
                </div>
                @endif
            @endforeach
        @endforeach
                
                
            </div>
        </div>

        <div class="content">
        <div class="pagination">{{$product->links('pagination::bootstrap-4')}}</div>
        </div>

@endsection