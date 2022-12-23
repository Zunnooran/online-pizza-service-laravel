@extends('include.admin_layout')
@section('view')

<div class="container1 form-container" style="padding-top: 70px">
    <div class="row">
        <div>
            <div style="margin-top:6rem; position: relative;display:inline;">
                <h1> Show Drinks</h1>
            </div>
            <div >
                <a class="btn1 btn-primary1" style="margin-left: 20px;position: absolute;left:80%; top:14%; outline: none;text-decoration: none;" href="{{ route('a.pizza') }}"> Back</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h3>Name:  {{ $show->name }}</h3>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h3>Price:{{ $show->price }}</h3>
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h3>Image:</h3>
                <img src="/images/{{ $show->image }}" width="300px">
            </div>
        </div>
    </div>
</div>
@endsection