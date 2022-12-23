@extends('include.admin_layout')
@section('view')
<div class="container1 "  >
  <div class="row ">
      <div class="pull-left " style="margin-top:6rem; position: relative;display:inline; ">
          <h1>Details of Pizza</h1>
      </div>
        <a class="btn1 btn-primary1" style="margin-left: 20px;position: absolute;left:80%; top:14%; outline: none;text-decoration: none;" href="{{route('add-pizza')}}">Add New Pizza</a>
  </div>
</div>

<div class=" container1" >
  <table class="table ">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
           <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
        </div>
     @endif
      <thead>
          <tr>
              <th style="width: 150px">ID</th>
              <th scope="col">Name</th>
              <th  style="width: 200px">Price</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
  
  <tbody>
          @foreach ($info as $item)
          <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->price}}</td>
              <td><img src="/images/{{$item->image}}" width="100px" alt=""></td>
              <td><a href="{{url('/p.show',$item->id)}}" class="btn1 btn-info ">Show</a>
                <a href="{{url('/p.edit',$item->id)}}" class="btn1 btn-info ">Edit</a>
              <a href="{{url('/p.delete',$item->id)}}" class="btn1 btn-danger">Delete</a></td>
          </tr>
          @endforeach
  </tbody>
</table>
</div>
@endsection