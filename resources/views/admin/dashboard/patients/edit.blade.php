@extends('layouts.master')

@section('title', 'تعديل مريض')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تعديل مريض</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">إدارة المرضى</a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل مريض</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تعديل مريض</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="user_id">المريض</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="{{ $patient->user_id }}" selected>{{ $patient->user->name }}</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $patient->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="registration_date">تاريخ التسجيل</label>
                        <input type="date" name="registration_date" id="registration_date" class="form-control" value="{{ old('registration_date', $patient->registration_date) }}" required>
                        @error('registration_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="medical_notes">الملاحظات الطبية</label>
                        <textarea name="medical_notes" id="medical_notes" class="form-control">{{ old('medical_notes', $patient->medical_notes) }}</textarea>
                        @error('medical_notes')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
