@extends('layouts.master')

@section('title', 'تفاصيل الدواء')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تفاصيل الدواء</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('medications.index') }}">إدارة الأدوية</a></li>
                <li class="breadcrumb-item active" aria-current="page">تفاصيل الدواء</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تفاصيل الدواء</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>اسم الدواء</th>
                        <td>{{ $medication->medication_name }}</td>
                    </tr>
                    <tr>
                        <th>الجرعة</th>
                        <td>{{ $medication->dosage }}</td>
                    </tr>
                    <tr>
                        <th>الوصف</th>
                        <td>{{ $medication->description ?? 'لا يوجد وصف' }}</td>
                    </tr>
                    <tr>
                        <th>التاريخ</th>
                        <td>{{ $medication->created_at }}</td>
                    </tr>
                </table>
                <a href="{{ route('medications.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> العودة إلى القائمة
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
