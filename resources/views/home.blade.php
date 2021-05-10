@extends('layouts.layout')

@section('content')
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="button button1">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="button button1">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button button1">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
            
            <div><img src="/img/incombanner .png" alt="in.com banner" class="bg"></div>

                <div>
                    <a href="/buy" class="button button1">BUY</a>
                    <a href="/sell" class="button button1">SELL</a>
                    @auth
                    <a href="/myadds" class="button button1">MY PROFILE</a>
                    @endauth
                </div>

                <div><img src="/img/in.com.png" alt="in.com logo" width="300" hight="300"></div>
            </div>
            
            


            <div class="box">
                
                <div class="wrapper">
                <div class="card">
                <img src="/img/PSX_20210124_211641.jpg" alt="Avatar" style="width:100%">
                <h1>Md. Rakib Ul Hasan Sefat</h1>
                <h2>Roll: 1707095</h2>
                </div>
    
                </div>

                <div class="wrapper">
                <div class="card">
                <img src="/img/PSX_20210124_211641.jpg" alt="Avatar" style="width:100%">
                <h1>Md. Rakib Ul Hasan Sefat</h1>
                <h2>Roll: 1707095</h2>
                </div>
    
                </div>
                

        </div>
@endsection

