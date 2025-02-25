@extends('layouts.master')

@section('title', 'تفاصيل العلاج')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تفاصيل العلاج</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('treatments.index') }}">إدارة العلاجات</a></li>
                <li class="breadcrumb-item active" aria-current="page">تفاصيل العلاج</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تفاصيل العلاج</h3>
            </div>
            <div class="card-body">
                <p><strong>اسم العلاج:</strong> {{ $treatment->treatment_name }}</p>
                <p><strong>الوصف:</strong> {{ $treatment->description }}</p>
                <p><strong>التكلفة:</strong> {{ $treatment->cost }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
