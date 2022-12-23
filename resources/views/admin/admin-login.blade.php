@extends('include.admin-layout')
@section('view')
<div class="container">
	<div class="row text-center " >
	    <div class="col-md-6 offset-md-3 " style="margin-top: 13% " >
	        <div class="card p-4 " >
	            <div class="card-body ">
	                <div class="login-title">
	                    <h4>Admin Log In</h4>
	                </div>
	                <div class="login-form mt-4">
	                    <form action="{{route('admin.post')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                              <input id="email" name="email" placeholder="Email Address" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-12">
                              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                          </div>
                        <div class="form-row">
                            <input type="submit" id="btn-sub" value="Submit" class="btn btn-danger btn-block"> 
                            
                        </div>
                    </form>
	                </div>
	                
	            </div>
	        </div>
    
@endsection