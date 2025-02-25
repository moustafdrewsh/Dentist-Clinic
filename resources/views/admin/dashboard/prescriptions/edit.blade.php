@extends('layouts.master')

@section('title', 'تعديل الوصفة')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تعديل الوصفة</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('prescriptions.index') }}">إدارة الوصفات</a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل الوصفة</li>
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
                <form action="{{ route('prescriptions.update', $prescription->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="patient_id">المريض</label>
                        <select name="patient_id" id="patient_id" class="form-control" required>
                            <option value="{{ $prescription->patient_id }}">{{ $prescription->patient->user->name }}</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="doctor_id">الطبيب</label>
                        <select name="doctor_id" id="doctor_id" class="form-control" required>
                            <option value="{{ $prescription->doctor_id }}">{{ $prescription->doctor->user->name }}</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="medication_id">الدواء</label>
                        <select name="medication_id" id="medication_id" class="form-control" required>
                            <option value="{{ $prescription->medication_id }}">{{ $prescription->medication->medication_name }}</option>
                            @foreach ($medications as $medication)
                                <option value="{{ $medication->id }}">{{ $medication->medication_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dosage">الجرعة</label>
                        <input type="text" name="dosage" id="dosage" class="form-control" value="{{ $prescription->dosage }}" required>
                    </div>

                    <div class="form-group">
                        <label for="issued_date">تاريخ الإصدار</label>
                        <input type="date" name="issued_date" id="issued_date" class="form-control" value="{{ $prescription->issued_date->format('Y-m-d') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">تحديث الوصفة</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
