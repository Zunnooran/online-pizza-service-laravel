
@extends('include.admin_layout')
@section('title','Read page')
@section('view')
<div style="height: 500px">
    <div class=" container1" style="padding-top: 40px">
        <h1>User Contacts</h1>
        <table class="table  cotainer_table" >
            <thead>
                <tr>
                    <th style="width: 200px">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Text</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        
        <tbody>
                @foreach ($info as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->Name}}</td>
                    <td>{{$item->Email}}</td>
                    <td>{{$item->Text}}</td>
                    <td>
                        {{-- <a href="{{url('/edit',$item->id)}}" class="btn1 btn-info ">Edit</a> --}}
                    <a href="{{url('/delete',$item->id)}}" class="btn1 btn-danger">Delete</a></td>
                </tr>
                @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection