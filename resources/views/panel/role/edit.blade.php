@extends('panel.layouts.app')
@section('content')
  
<div class="pagetitle">
    <h1>Edit Role</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Role</h5>

            <!-- General Form Elements -->
            <form action="" method="POST">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Name</label>
                <div class="col-sm-12">
                  <input type="text" name="name" required value="{{$getRecord->name}}" class="form-control">
                </div>
              </div>
           


              <div class="row mb-3">
                <label style="display: block; margin-bottom: 20px" for="inputText" class="col-sm-12 col-form-label">
                  <b>Permission</b></label>

                  @foreach($getPermission as $value)
   

                  <div class="row" style="margin-bottom: 20px">
                      <div class="col-md-3">
                          {{$value['name']}}
                      </div>
              
                      <div class="col-md-9">
                          <div class="row">
                              @if(isset($value['group']) && is_array($value['group']))
                                  @foreach($value['group'] as $group)
                                  @php
                                  $checked = '' ;   
                                 @endphp
                                  @foreach($getRolePermission as $role)
                                  
               
                        @if($role->permission_id == $group['id'] )
                        @php
                  $checked = 'checked' ;   
                 @endphp
                        @endif
                                  @endforeach
                                      <div class="col-md-4">
                                          <label><input type="checkbox" {{$checked}} value="{{$group['id']}}" name="permission_id[]">{{$group['name']}}</label>
                                      </div>
                                  @endforeach
                              @else
                                  <span>No groups available</span>
                              @endif
                          </div>
                      </div>
                  </div>
                 @endforeach
              
              </div>


              <div class="row mb-3">
                <div class="col-sm-8">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
              

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      
    </div>
  </section>

 @endsection