@extends('layouts.master')

@section('title', 'إضافة وصفة جديدة')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إضافة وصفة جديدة</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('prescriptions.index') }}">إدارة الوصفات</a></li>
                <li class="breadcrumb-item active" aria-current="page">إضافة وصفة جديدة</li>
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
                <form action="{{ route('prescriptions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="patient_id">المريض</label>
                        <select name="patient_id" id="patient_id" class="form-control" required>
                            <option value="">اختر مريضًا</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="doctor_id">الطبيب</label>
                        <select name="doctor_id" id="doctor_id" class="form-control" required>
                            <option value="">اختر طبيبًا</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="medication_id">الدواء</label>
                        <select name="medication_id" id="medication_id" class="form-control" required>
                            <option value="">اختر دواء</option>
                            @foreach ($medications as $medication)
                                <option value="{{ $medication->id }}">{{ $medication->medication_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    <div class="form-group">
                        <label for="dosage">الجرعة</label>
                        <input type="text" name="dosage" id="dosage" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="issued_date">تاريخ الإصدار</label>
                        <input type="date" name="issued_date" id="issued_date" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">حفظ الوصفة</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
