@extends('layouts.master')

@section('title', 'تعديل موعد')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تعديل موعد</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">إدارة المواعيد</a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل موعد</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">تعديل موعد</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="patient_id">المريض</label>
                        <select name="patient_id" id="patient_id" class="form-control" required>
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                    {{ $patient->user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="doctor_id">الطبيب</label>
                        <select name="doctor_id" id="doctor_id" class="form-control" required>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                    {{ $doctor->user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="appointment_datetime">التاريخ والوقت</label>
                        <input type="datetime-local" name="appointment_datetime" id="appointment_datetime" class="form-control" value="{{ $appointment->appointment_datetime->format('Y-m-d\TH:i') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">تحديث</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
