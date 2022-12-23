@extends('include.admin_layout')
@section('view')
<div class="container1 "  >
  <div class="row ">
      <div class="pull-left " style="margin-top:6rem; position: relative;display:inline; ">
          <h1>Details of Order</h1>
      </div>
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
              <th  style="width: 200px">Order</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
  
  <tbody>
          @foreach ($data as $data)
          <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->order}}</td>
              <td>
                
              <a href="{{url('/order.delete',$data->id)}}" class="btn1 btn-danger">Done</a></td>
          </tr>
          @endforeach
  </tbody>
</table>
</div>
@endsection