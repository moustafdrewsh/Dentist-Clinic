@extends('panel.layouts.app')
@section('content')
  
<div class="pagetitle">
    <h1>User</h1>
    @if(!empty($PermissionAdd))
    <a href="{{url('panel/user/add')}}" class="btn btn-primary">Add User</a>
    @endif
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
      @include('_message')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">User List</h5>
           
            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Date</th>
                  @if(!empty($PermissionEdit) || !empty($PermissionEdit))
                  <th scope="col">Action</th>
                  @endif                </tr>
              </thead>
              <tbody>
                @foreach($getRecord as $value)
                <tr>
                  <th scope="row">{{$value->id}}</th>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->role_name}}</td>
                  <td>{{$value->created_at}}</td>
                  <td>
                    @if(!empty($PermissionEdit))
                    <a href="{{url('panel/user/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                    @endif
                    @if(!empty($PermissionDelete))
                    <a href="{{url('panel/user/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                    @endif
                  </td>
                  
                </tr>
                @endforeach
                
              </tbody>
            </table>
            <!-- End Default Table Example -->
          </div>
        </div>

      
      </div>

     
    </div>
  </section>

 @endsection