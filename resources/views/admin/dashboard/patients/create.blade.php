<!-- resources/views/patients/create.blade.php -->
@extends('layouts.master')

@section('title', 'إضافة مريض جديد')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إضافة مريض جديد</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">إدارة المرضى</a></li>
                <li class="breadcrumb-item active" aria-current="page">إضافة مريض جديد</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">إضافة مريض جديد</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('patients.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="user_id">المريض</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
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
                        <input type="date" name="registration_date" id="registration_date" class="form-control" required value="{{ old('registration_date') }}">
                        @error('registration_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="medical_notes">الملاحظات الطبية</label>
                        <textarea name="medical_notes" id="medical_notes" class="form-control">{{ old('medical_notes') }}</textarea>
                        @error('medical_notes')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">حفظ</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
