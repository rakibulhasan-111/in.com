@extends('layouts.app')


@section('content')
        <div class="flex-center position-ref full-height">
            
            <div class="content">

                <div class="title m-b-md">
                    {{$user_name}}
                </div>

                <div class="links">
                    <a href="/buy">Buy</a>
                    <a href="/sell">Sell</a>
                </div>

                

                @foreach($product as $item)
                
                    <div class="wrapper product-details">


                    <h1>{{ $item->product_name }}</h1>
                    <h3>by {{ $item->user_name}}</h3>
                    <p class="description">{{$item->description}}</p>
                    <p class="price">Price : {{$item->price}}</p>
                    <p class="contact">Contact Number : {{$item->contact_number}}</p>
                    <?php $id_number=$item->id?>
                    <p class="contact">Contact Number : {{$item->contact_number}}</p>
                    <p class="image">{{$item->image}}</p>
                    <a href="{{ route('products.edit', ['id_number'=>$id_number]) }}" class="btn btn-sm btn-success">Edit</a>
                    <a href="{{route('products.delete', ['id_number'=>$id_number])}}" class="btn btn-sm btn-danger">Delete</a>
                    
                    

                    </div>
                
                @endforeach

                <h1>Nothing is here for now!</h1>
                
            </div>

        </div>
@endsection

