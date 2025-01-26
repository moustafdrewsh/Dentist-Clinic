@extends('layouts.master')

@section('title')
    تعديل الدور
@endsection

@section('css')
    <!-- يمكنك إضافة أكواد CSS الخاصة هنا إن وجدت -->
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تعديل الدور</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">الأدوار</a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل الدور</li>
            </ol>
        </div> 
    </div>
    <!-- PAGE-HEADER END -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تعديل الدور</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">اسم الدور</label>
                        <input type="text" name="name" id="name" value="{{ $role->name }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الصلاحيات</label>
                        @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                id="permission-{{ $permission->id }}" @if ($role->permissions->contains($permission)) checked @endif>
                            <label class="form-check-label" for="permission-{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">تحديث الدور</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">رجوع إلى الأدوار</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- يمكنك إضافة أكواد JavaScript الخاصة هنا إن وجدت -->
@endsection
