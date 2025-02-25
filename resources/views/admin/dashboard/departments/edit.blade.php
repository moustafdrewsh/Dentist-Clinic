@extends('layouts.master')

@section('title', 'تعديل قسم')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تعديل قسم</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">إدارة الأقسام</a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل قسم</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تعديل بيانات القسم</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('departments.update', $department->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="department_name">اسم القسم</label>
                        <input type="text" name="department_name" id="department_name" class="form-control" value="{{ old('department_name', $department->department_name) }}" required>
                        @error('department_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $department->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">تحديث</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
