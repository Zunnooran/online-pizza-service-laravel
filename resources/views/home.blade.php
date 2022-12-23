
@php
use App\Models\pizza;
$data_pizza=pizza::all();
use App\Models\deal;
$data_deal=deal::all();
use App\Models\drink;
$data_drink=drink::all();   
@endphp
@extends('include.layout')
@section('title','Home')
@section('homenav')
        <li><a href="/#about">About</a></li>
        <li><a href="/#pizza-menu">Menu</a></li>
        <li><a href="/#deals">Deals</a></li>
        
@endsection
@section('login')
        @if (Route::has('login'))
    @auth
        <li><a href="{{route('cart.index')}}">Cart</a></li>
        <li><x-app-layout>   
        </x-app-layout></li>
        <li style="font-weight: bold; font-size:20px;">{{ Auth::user()->name }}</li>
    @else
        <li><a href="{{ route('login') }}" >Log In</a></li>
    @endauth
@endif
@endsection
@section('view')
   <section class="showcase-area" id="showcase">
       <div class="showcase-container">
           <h1 class="main-title ">Pizza Delivery Service</h1>
           <p>We prvide you the best Pizza Take away or Home Delivery Service</p>
           <a href="#pizza-menu" class="btn1 btn-primary1">Menu</a>    
       </div>
   </section>
   <section class="about" id="about">
        <div class="about-wrapper container1">
            <div class="about-text">
                <p class="small">About Us</p>
                <h2>We are providing the Best <span style="color: rgba(255, 51, 0, 0.801);">PIZZA</span> Delivery services from the last 5 Years</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo inventore et architecto ea, tempore eos mollitia possimus minus alias cupiditate aliquid quibusdam nulla, debitis tempora aliquam autem magnam minima eum delectus, velit perspiciatis nisi quaerat. Velit dolorum quis praesentium similique!</p>
            </div>
            <div class="about-img">
                <img src="./images/pexels-rodolfo-clix-1596888.jpg" alt="">
            </div>
        </div>
   </section>
   <section class="stuffs" id="pizza-menu">
       <div class="container1">
           <h1>Menu</h1>
            <div class="menu-titel">
                <h2>Pizza</h2>
                <div class="line"></div>
                <div class="row">
                    @foreach ($data_pizza as $d)
                        <div class="col-sm-3">
                            <div class="img-container">
                                <img src="{{asset('images')}}/{{$d->image}}" alt="pizza pic" class="img-pizza">
                                <div class="price"><h1>RS-{{$d->price}}</h1></div>
                                <div class="img-content">
                                    <h3 class="text-light">{{$d->name}}</h3>
                                    

                                

                                    <a href="{{url('cart-pizza')}}/{{$d->id}}" class="btn1 btn-primary1">Buy</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        <div class="menu-titel">
            <h2>Drinks</h2>
            <div class="line"></div>
            <div class="drinks-wrapper">
                @foreach ($data_drink as $d)
                <div class="img-container">
                    <img src="{{asset('images')}}/{{$d->image}}" alt="drink pic" class="img-drinks">
                    <div class="price"><h1>RS-{{$d->price}}</h1></div>
                    <div class="img-content">
                        <h3 class="text-light">{{$d->name}}</h3>


                        <a href="{{url('cart-drink')}}/{{$d->id}}" class="btn1 btn-primary1">Buy</a>
                    </div>
                </div>    
                @endforeach
            </div>
        </div>
        </div>
   </section>
   <section class="deal " id="deals">
       <h2 class="deal-heading">
           Deals
       </h2>
       <div class="deal-wrapper container1">
           @foreach ($data_deal as $d) 
           <div class="deal-item">
               <div class="deal-img">
                   <img src="{{asset('images')}}/{{$d->image}}" alt="deal-image">
               </div>
               <div class="deal-discription">
                  <h2 class="deal-title">{{$d->name}}</h2>
                  <p>{{$d->description}}</p>
                  <a href="{{url('cart-deal')}}/{{$d->id}}" class="btn1 btn-primary1">RS-{{$d->price}}</a>
                 </div>
             </div>
           @endforeach
       </div>
   </section>
   <section id="feadback">
       <h2 class="feadback-title">What our customer say</h2>
       <div class="feadback-container container1">
           <div class="feadback-box">
               <div class="star-rating">
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
               </div>
               <p class="feadback-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem eveniet cupiditate officia!</p>
               <div class="customer-detail">
                   <div class="customer-photo"><img src="images\WhatsApp Image 2021-07-13 at 3.49.55 PM (1).jpeg" alt="photo of person"></div>
                   <p class="customer-name">Usman</p>
               </div>
           </div>
           <div class="feadback-box">
               <div class="star-rating">
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
               </div>
               <p class="feadback-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem eveniet cupiditate officia!</p>
               <div class="customer-detail">
                   <div class="customer-photo"><img src="images\WhatsApp Image 2021-07-13 at 3.49.55 PM (2).jpeg" alt="photo of person"></div>
                   <p class="customer-name">Zain</p>
               </div>
           </div>
           <div class="feadback-box">
               <div class="star-rating">
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fa fa-star checked"></span>
                   <span class="fas fa-star-half-alt checked"></span>
               </div>
               <p class="feadback-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem eveniet cupiditate officia!</p>
               <div class="customer-detail">
                   <div class="customer-photo"><img src="images\WhatsApp Image 2021-07-13 at 3.49.55 PM.jpeg" alt="photo of person"></div>
                   <p class="customer-name">Husnain</p>
               </div>
           </div>
       </div>
   </section>
   <!-- ########################### for scrolling ######################  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
@endsection