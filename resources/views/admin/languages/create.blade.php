@extends('layouts.master')

@section('title')
    إضافة لغة جديدة
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إضافة لغة جديدة</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إضافة لغة</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تفاصيل اللغة</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('languages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم اللغة</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="name_in_english" class="form-label">الاسم بالإنجليزية</label>
                        <input type="text" name="name_in_english" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">رمز اللغة</label>
                        <input type="text" name="code" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="panel_file" class="form-label">ملف لوحة التحكم</label>
                        <input type="file" name="panel_file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="app_file" class="form-label">ملف التطبيق</label>
                        <input type="file" name="app_file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="web_file" class="form-label">ملف الويب</label>
                        <input type="file" name="web_file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">صورة</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">حفظ</button>
                        <a href="{{ route('languages.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
