<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("/css/all.css")}}">
    {{-- <link rel="stylesheet" href="{{asset("/css/bootstrsap.css")}}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
    <style>
        section{
            padding-top: 4%;
        }
    </style>
</head>
<body>
   <nav class="navbar1">
       <div class="navbar1-container container1">
           <input type="checkbox" >
           <div class="hamburger-lines">
               <span class="line line1"></span>
               <span class="line line2"></span>
               <span class="line line3"></span>
           </div>
           <ul class="menu-items">
               <li><a href="{{Route('home')}}">Home</a></li>
               @yield('homenav')
               <li><a href="{{Route('contact')}}">Contact</a></li>
               
               @yield('login')
            </ul>
           <h1 class="logo">PD</h1>
       </div>
   </nav>
   @yield('view')
   <footer class="footer ">
    <div class="footer-wrapper container1">
        <div class="footer-icons">
            <a href="https://www.facebook.com/login/" class="fab fa-facebook-square text-light"></a>
            <a href="https://twitter.com/login/" class="fab fa-twitter-square text-light"></a>
            <a href="https://www.instagram.com/login/" class="fab fa-instagram-square text-light"></a>
        </div>
        <div class="footer-text text-light">
             <p>All &copy; copyright Reserved</p>
        </div>
    </div>
</footer>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
</body>
</html>