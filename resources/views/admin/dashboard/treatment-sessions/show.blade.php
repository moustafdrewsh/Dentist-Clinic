@extends('layouts.master')

@section('title', 'تفاصيل جلسة علاج')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تفاصيل جلسة علاج</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('treatment-sessions.index') }}">جلسات العلاج</a></li>
                <li class="breadcrumb-item active" aria-current="page">تفاصيل جلسة علاج</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تفاصيل جلسة العلاج</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="patient">المريض</label>
                    <input type="text" class="form-control" value="{{ $session->patient->user->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="doctor">الطبيب</label>
                    <input type="text" class="form-control" value="{{ $session->doctor->user->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="treatment">العلاج</label>
                    <input type="text" class="form-control" value="{{ $session->treatment->treatment_name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="session_datetime">تاريخ الجلسة</label>
                    <input type="text" class="form-control" value="{{ $session->session_datetime }}" disabled>
                </div>
                <div class="form-group">
                    <label for="notes">ملاحظات</label>
                    <textarea class="form-control" rows="3" disabled>{{ $session->notes }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
