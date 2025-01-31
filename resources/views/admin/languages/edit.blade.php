@extends('layouts.master')
@section('content')
<div class="container">
    <h1>Edit Language</h1>
    <form action="{{ route('languages.update', $language->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $language->name }}" required>
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" name="code" class="form-control" value="{{ $language->code }}" required>
        </div>
        <div class="form-group">
            <label for="panel_file">Panel File</label>
            <input type="file" name="panel_file" class="form-control">
        </div>
        <div class="form-group">
            <label for="app_file">App File</label>
            <input type="file" name="app_file" class="form-control">
        </div>
        <div class="form-group">
            <label for="web_file">Web File</label>
            <input type="file" name="web_file" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
