@extends('include.admin_layout')
@section('view')
<div style="height: 500px">
    <div class="container1 form-container" style="padding-top: 70px">
        <div class="row">
            <div>
                <div style="margin-top:6rem; position: relative;display:inline;">
                    <h1> Show Deals</h1>
                </div>
                <div >
                    <a class="btn1 btn-primary1" href="{{ route('deals.index') }}" style="margin-left: 20px;position: absolute;left:80%; top:14%; outline: none;text-decoration: none;" > Back</a>
                </div>
            </div>
        </div>
     
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h3>Name:  {{ $deal->name }}</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h3>Price:{{ $deal->price }}</h3>
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h3>Price:{{ $deal->description }}</h3>
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h3 style="display: inline">Image:</h3>
                    <img src='{{URL::asset('images/'.$deal->image)}}'       width="150px">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection