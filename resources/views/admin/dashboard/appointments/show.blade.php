@extends('layouts.master')

@section('title', 'تفاصيل الموعد')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تفاصيل الموعد</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">إدارة المواعيد</a></li>
                <li class="breadcrumb-item active" aria-current="page">تفاصيل الموعد</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">تفاصيل الموعد</h3>
            </div>
            <div class="card-body">
                <p><strong>المريض:</strong> {{ $appointment->patient->user->name }}</p>
                <p><strong>الطبيب:</strong> {{ $appointment->doctor->user->name }}</p>
                <p><strong>التاريخ والوقت:</strong> {{ $appointment->appointment_datetime }}</p>
                <p><strong>الحالة:</strong> {{ __('statuses.' . $appointment->status) }}</p>
                <a href="{{ route('appointments.index') }}" class="btn btn-secondary">العودة</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
