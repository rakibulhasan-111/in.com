@extends('layouts.app')


@section('content')
        <div class="wrapper">
            

                
                
                <div class="wrapper product-details">
                    <h1>{{ $item->product_name }}</h1>
                    <h3>by {{ $item->user_name}}</h3>
                    <h1>Category : {{$item->category_id}}</h1>
                    <img src="{{URL::to($item->image)}}">
                    <p class="description">{{$item->description}}</p>
                    <p class="price">Price : {{$item->price}}</p>
                    <p class="contact">Contact Number : {{$item->contact_number}}</p>
                    
                    @if(isset($favorite))
                        <h4>[Added to Favourite]</h4>
                        <a href="{{route('myfavorites')}}" class="button button1">Go to Favorites</a>

                    @else
                        <a href="{{ route('addFavorite', ['id_number'=>$item->id]) }}" class="button button1">Add to Favourite</a>

                    @endif

                </div>
                
                <a href="/buy/{{$item->category_id}}" class="button button1">Back to {{$item->category_id}} page</a>
                
            </div>
        </div>
@endsection