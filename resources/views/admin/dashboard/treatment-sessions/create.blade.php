@extends('layouts.master')

@section('title', 'إضافة جلسة علاج')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إضافة جلسة علاج</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('treatment-sessions.index') }}">جلسات العلاج</a></li>
                <li class="breadcrumb-item active" aria-current="page">إضافة جلسة علاج</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">إضافة جلسة علاج جديدة</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('treatment-sessions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="patient_id">المريض</label>
                        <select name="patient_id" id="patient_id" class="form-control" required>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="doctor_id">الطبيب</label>
                        <select name="doctor_id" id="doctor_id" class="form-control" required>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="treatment_id">العلاج</label>
                        <select name="treatment_id" id="treatment_id" class="form-control" required>
                            @foreach ($treatments as $treatment)
                                <option value="{{ $treatment->id }}">{{ $treatment->treatment_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="session_datetime">تاريخ الجلسة</label>
                        <input type="datetime-local" name="session_datetime" id="session_datetime" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="notes">ملاحظات</label>
                        <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">إضافة الجلسة</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
