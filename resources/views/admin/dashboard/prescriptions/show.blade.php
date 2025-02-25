@extends('layouts.master')

@section('title', 'تفاصيل الوصفة')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تفاصيل الوصفة</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('prescriptions.index') }}">إدارة الوصفات</a></li>
                <li class="breadcrumb-item active" aria-current="page">تفاصيل الوصفة</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تفاصيل الوصفة</h3>
            </div>
            <div class="card-body">
                <p><strong>المريض:</strong> {{ $prescription->patient->user->name }}</p>
                <p><strong>الطبيب:</strong> {{ $prescription->doctor->user->name }}</p>
                <p><strong>الدواء:</strong> {{ $prescription->medication->medication_name }}</p>
                <p><strong>الجرعة:</strong> {{ $prescription->dosage }}</p>
                <p><strong>تاريخ الإصدار:</strong> {{ $prescription->issued_date->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
