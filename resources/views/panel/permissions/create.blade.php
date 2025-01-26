@extends('panel.layouts.app')
@section('content')

<div class="container">
    <h1>Add New Permissions</h1>

    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="slug"> Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" required>
        </div>

        <div class="form-group">
            <label for="groupby">Group</label>
            <input type="number" class="form-control" name="groupby" id="groupby" required>
        </div>

        <button type="submit" class="btn btn-success mt-4">Create</button>
    </form>
</div>
@endsection