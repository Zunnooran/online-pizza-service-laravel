@extends('include.admin_layout')
@section('view')

    <div class="container" style="height: 500px">
        
        <div class="panel panel-primary">
          
          <div class="panel-body">
         
           
                <div class="form-container">
                    
                    <form action="{{ route('p.update.put',$edit->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="row " style="margin-top: 6rem"> 
                                <div class="pull-left" style=" position: relative;display:inline;" >
                                    <h2>Edit Pizza</h2>
                                </div>
                                <div class="pull-right " style="margin-left: 20px;position: absolute;left:65%; top:12%; outline: none;text-decoration: none;">
                                    <a class="btn1 btn-primary1" href="{{route('a.pizza')}}"> Back</a>
                                </div>
                        </div>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            
                            <h3><label for="name">Pizza Name </label></h3><br>
                            <input type="text" name="name" value="{{$edit->name}}" id="name" class="form-control">
                            @error('name')
                                <span style="color: red; width:100%;">{{$message}}</span>
                             @enderror
                                 
                            <h3><label for="price">Pizza Price: </label></h3>
                            <input type="text" name="price"value="{{$edit->price}}"  id="price" class="form-control">
                            @error('name')
                                <span style="color: red; width:100%;">{{$message}}</span>
                            @enderror  

                            <h3><label for="image" >Pizza Image: </label></h3>
                            <input type="file" name="image">
                            <img src="/images/{{$edit->image}}" width="70px" alt="">
                            @error('name')
                                <span style="color: red; width:100%;">{{$message}}</span>
                            @enderror 
                        </div>
                        <div class="row" >
                                <input type="submit" id="btn-sub" value="Update" class="btn1 btn-primary1"> 
                        </div>
                        
                    </form>
                </div>
                
          </div>
        </div>
    </div>  
@endsection 