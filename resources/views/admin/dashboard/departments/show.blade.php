@extends('layouts.master')

@section('title', 'تفاصيل القسم')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تفاصيل القسم</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">إدارة الأقسام</a></li>
                <li class="breadcrumb-item active" aria-current="page">تفاصيل القسم</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">معلومات القسم</h3>
            </div>
            <div class="card-body">
                <h5><strong>اسم القسم:</strong> {{ $department->department_name }}</h5>
                <h5><strong>الوصف:</strong> {{ $department->description ?? 'غير محدد' }}</h5>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i> تعديل
                    </a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> حذف
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
