@extends('panel.layouts.app')
@section('content')
<div class="container">

    <h1>  Users Permissions</h1>
   @include('_message')
   @if(!empty($PermissionAdd))
    <a href="{{ route('permissions.create') }}" class="btn btn-primary">  Add New Permissions</a>
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th> Slug</th>
                <th>Group</th>
                @if(!empty($PermissionEdit) || !empty($PermissionDelete))
                <th scope="col">Action</th>
                @endif     
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->slug }}</td>
                    <td>{{ $permission->groupby }}</td>
                    <td>
                        @if(!empty($PermissionEdit))
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning">Edit</a>
                        @endif     

                        @if(!empty($PermissionDelete))
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endif     

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection