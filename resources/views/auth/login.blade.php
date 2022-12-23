 @extends('include.layout')
    @section('title','Log in')
    @section('view')
    @section('login')
                 @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" >Register</a></li>
                 @endif
    @endsection
        
<div class="login-container container1">

    <div class="form-container margin-form">

        <form method="POST" action="{{ route('login') }}">
            @csrf
               <!-- Session Status -->
               <x-auth-session-status style="color: red" :status="session('status')" />
    
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />
    
                <x-input id="email" class="block " type="email" name="email" :value="old('email')" required autofocus />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
    
                <x-input id="password" class="block"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            
    
            <!-- Remember Me -->
            
            <div>
                <input id="remember_me" type="checkbox" class="" name="remember"  style="position: relative;left:-49%;display:inline;" > 
                <span style="margin-left: 20px;position: absolute;left:31%;">{{ __('Remember me') }}</span>
            </div>
            
            <div class="">
                @if (Route::has('password.request'))
                    <a class="login" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
    
                <x-button class="">
                    {{ __('Log in') }}
                </x-button>
             
                <!-- Validation Errors -->
            <x-auth-validation-errors style="color: red; margin-left: 5px;" :errors="$errors" /> 
             
            </div>
        </form>
    </div>
</div>

@endsection
 

