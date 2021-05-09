@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
            <img src="/img/in.com.png" alt="in.com logo" width="500" hight="500">
                

                <div class="links">
                    <a href="/buy" class="button button1">Buy</a>
                    <a href="/sell" class="button button1">Sell</a>
                    <a href="/myadds" class="button button1">My Profile</a>
                </div>
            </div>
        </div>
@endsection

