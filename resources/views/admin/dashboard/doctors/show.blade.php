@extends('layouts.master')

@section('title', 'تفاصيل الطبيب')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تفاصيل الطبيب</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">إدارة الأطباء</a></li>
                <li class="breadcrumb-item active" aria-current="page">تفاصيل الطبيب</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">معلومات الطبيب</h3>
            </div>
            <div class="card-body">
                <h5><strong>اسم الطبيب:</strong> {{ $doctor->user->name }}</h5>
                <h5><strong>التخصص:</strong> {{ $doctor->specialization }}</h5>
                <h5><strong>ساعات العمل:</strong> {{ $doctor->working_hours }}</h5>
                <h5><strong>سنوات الخبرة:</strong> {{ $doctor->years_of_experience }}</h5>
                <h5><strong>القسم:</strong> {{ $doctor->department ?? 'غير محدد' }}</h5>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i> تعديل
                    </a>
                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
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
