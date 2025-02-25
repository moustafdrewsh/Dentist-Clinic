<!-- resources/views/patients/show.blade.php -->
@extends('layouts.master')

@section('title', 'تفاصيل المريض')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تفاصيل المريض</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">إدارة المرضى</a></li>
                <li class="breadcrumb-item active" aria-current="page">تفاصيل المريض</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تفاصيل المريض</h3>
            </div>
            <div class="card-body">
                <p><strong>اسم المريض:</strong> {{ $patient->user->name }}</p>
                <p><strong>تاريخ التسجيل:</strong> {{ $patient->registration_date }}</p>
                <p><strong>الملاحظات الطبية:</strong> {{ $patient->medical_notes }}</p>
                <a href="{{ route('patients.index') }}" class="btn btn-secondary">عودة إلى القائمة</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
