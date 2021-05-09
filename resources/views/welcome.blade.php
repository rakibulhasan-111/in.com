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
                <div><img src="/img/incombanner .png" alt="in.com banner"></div>
            
                <div><img src="/img/in.com.png" alt="in.com logo" width="400" hight="400"></div>
            
                <div>
                    <a href="/buy" class="button button1">BUY</a>
                    <a href="/sell" class="button button1">SELL</a>
                    @auth
                    <a href="/myadds" class="button button1">MY PROFILE</a>
                    @endauth
                </div>
            </div>
            </div>
@endsection

