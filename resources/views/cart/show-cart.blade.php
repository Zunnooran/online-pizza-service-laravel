
@extends('include.layout')
@section('title','cart')
@section('homenav')
        <li><a href="/#about">About</a></li>
        <li><a href="/#pizza-menu">Menu</a></li>
        <li><a href="/#deals">Deals</a></li>
        
@endsection
@section('login')
        @if (Route::has('login'))
    @auth
        <li><x-app-layout>   
        </x-app-layout></li>
        <li style="font-weight: bold; font-size:20px;">{{ Auth::user()->name }}</li>
    @else
        <li><a href="{{ route('login') }}" >Log In</a></li>
    @endauth
@endif
@endsection
@section('view')
<div class=" container1" style="padding-top: 100px; height:500px">
    <h1>Shopping Cart</h1>
    <table class="table  cotainer_table" >
        <thead>
            <tr>
                <th style="width: 200px">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    
    <tbody>
            <?php
            $total=0;
            ?>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>
                    {{-- <a href="{{url('/edit',$item->id)}}" class="btn1 btn-info ">Edit</a> --}}
                <a href="{{url('/delete',$item->id)}}" class="btn1 btn-danger">Delete</a></td>
            </tr>
            <?php
                $int= (int)$item->price;
                $total=$total+$int;
            ?>
            @endforeach
    </tbody>
</table>
<a href="{{route('payment')}}" class="btn1 btn-primary1" style="position: absolute; left:80%">RS-{{ $total }}</a>
</div>
@endsection