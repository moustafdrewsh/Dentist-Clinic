@extends('layouts.master')

@section('title', 'إضافة موعد جديد')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إضافة موعد جديد</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إضافة موعد جديد</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">إضافة موعد جديد</h3>
                <a href="{{ route('appointments.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> العودة إلى المواعيد
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="patient_id" class="form-label">المريض</label>
                        <select name="patient_id" class="form-control">
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">الطبيب</label>
                        <select name="doctor_id" class="form-control">
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                        @endforeach
                        
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="appointment_datetime" class="form-label">التاريخ والوقت</label>
                        <input type="datetime-local" name="appointment_datetime" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> إضافة الموعد
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
