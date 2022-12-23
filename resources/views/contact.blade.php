@extends('include.layout')
@section('title','Contact')
@section('view')
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
<section class="contact" id="contact">
        <div class="contact-container container1">
            <div class="contact-img">
                <img src="./images/piizza-contact.jpg" alt="contact-img">
            </div>
            <div class="form-container">
                <h2>Contact Us</h2>
                <form action="" method="POST">
                    @csrf
                    <input type="text" name="name" value="{{old('name')}}" id="name" placeholder="Name">
                    @error('name')
                       <span style="color: red">{{$message}}</span> 
                    @enderror
                    <input type="email" name="email" value="{{old('email')}}" id="email" placeholder="email">
                    @error('email')
                       <span style="color: red">{{$message}}</span> 
                    @enderror
                    <textarea name="text" id="text" value="{{old('text')}}" cols="30" rows="10" placeholder="Type your text here"></textarea>
                    @error('text')
                       <span style="color: red">{{$message}}</span> 
                    @enderror
                    <input type="submit" id="btn-sub" value="Submit" class="btn1 btn-primary1 ">   
                </form>
                @if (session()->has('status'))
                    <div class="alert alert-success ">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        {{session('status')}}
                    </div>
                @endif
                {{-- @if ($errors->any())
                @foreach ($errors->all() as $messages)
                    {{$messages}}
                @endforeach
                @endif --}}
                {{-- <h1>{{$errors}}</h1> --}}
                {{-- {{-- @if (isset($data))
                 @foreach ($data as $item)
                     {{$item}}
                 @endforeach
                @endif --}}
            </div>
        </div>
</section>  
@endsection
    