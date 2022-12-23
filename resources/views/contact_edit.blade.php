@extends('include.layout')
@section('title','Edit Information')
@section('view')
<section class="contact" id="contact">
    <div style="height: 500px">
        <div class="contact-container container1">
            <div class="contact-img">
                {{-- This may be caused you are in a route which does not represent the base URL. 
                    You should generate the URL for your assets relative to the public/ folder. --}}
                <img src="{{ URL::asset("./images/piizza-contact.jpg")}}" alt="contact-img">
            </div>
            <div class="form-container">
                <h2>Contact Us</h2>
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{$edit->Name}}" id="name" placeholder="Name">
                    @error('name')
                       <span style="color: red">{{$message}}</span> 
                    @enderror
                    <input type="email" name="email" value="{{$edit->Email}}" id="email" placeholder="email">
                    @error('email')
                       <span style="color: red">{{$message}}</span> 
                    @enderror
                    <textarea name="text" id="text" value="{{$edit->Text}}" cols="30" rows="10" placeholder="Type your text here"></textarea>
                    @error('text')
                       <span style="color: red">{{$message}}</span> 
                    @enderror
                    <input type="submit" id="btn-sub" value="Update" class="btn1 btn-primary1 "> 
                    @if (session()->has('status'))
                    <div class="alert alert-success ">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        {{session('status')}}
                    </div>
                @endif 
                </form>
            </div>
        </div>
    </div>
</section>  
@endsection