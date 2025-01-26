@extends('panel.layouts.app')
@section('content')
<div class="container">
    <h1> Edit Permissions</h1>

    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $permission->name }}" required>
        </div>

        <div class="form-group">
            <label for="slug"> Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ $permission->slug }}" required>
        </div>

        <div class="form-group">
            <label for="groupby">Group</label>
            <input type="number" class="form-control" name="groupby" id="groupby" value="{{ $permission->groupby }}" required>
        </div>

        <button type="submit" class="btn btn-warning mt-4">Update</button>
    </form>
</div>
@endsection