@extends('layouts.master')

@section('title', 'إضافة دواء جديد')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إضافة دواء جديد</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('medications.index') }}">إدارة الأدوية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إضافة دواء جديد</li>
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
                <form action="{{ route('medications.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="medication_name">اسم الدواء</label>
                        <input type="text" class="form-control" id="medication_name" name="medication_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">الوصف (اختياري)</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dosage">الجرعة</label>
                        <input type="text" class="form-control" id="dosage" name="dosage" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">
                        <i class="fa fa-save"></i> حفظ
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
