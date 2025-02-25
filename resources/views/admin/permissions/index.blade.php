@extends('layouts.master')

@section('title', 'إدارة الصلاحيات')

@section('page-header')
<div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
    <h1 class="page-title">إدارة الصلاحيات</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">إدارة الصلاحيات</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- إضافة صلاحية جديدة -->
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">إضافة صلاحية جديدة</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم الصلاحية</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    @if ($languages->isNotEmpty())
                        <hr>
                        <h5>{{ __('ترجمة (اختياري)') }}</h5>
                        <div class="row">
                            @foreach ($languages as $language)
                                <div class="col-md-12 form-group">
                                    <label for="name_{{ $language->id }}" class="form-label">{{ $language->name }}</label>
                                    <input name="translations[{{ $language->id }}]" id="name_{{ $language->id }}" class="form-control">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success">إضافة صلاحية</button>
                </form>
            </div>
        </div>

        <!-- قائمة الصلاحيات -->
        <div class="card custom-card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">قائمة الصلاحيات</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead class="table">
                            <tr>
                                <th>اسم الصلاحية</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        
                                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الصلاحية؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
