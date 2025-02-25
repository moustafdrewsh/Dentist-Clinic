@extends('layouts.master')

@section('title', 'إضافة طبيب جديد')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إضافة طبيب جديد</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">إدارة الأطباء</a></li>
                <li class="breadcrumb-item active" aria-current="page">إضافة طبيب جديد</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">إضافة طبيب جديد</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('doctors.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="user_id">اسم الطبيب</label>
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
                        <label for="specialization">التخصص</label>
                        <input type="text" name="specialization" id="specialization" class="form-control" required value="{{ old('specialization') }}">
                        @error('specialization')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="years_of_experience">سنوات الخبرة</label>
                        <input type="number" name="years_of_experience" id="years_of_experience" class="form-control" required value="{{ old('years_of_experience') }}">
                        @error('years_of_experience')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="working_hours">ساعات العمل</label>
                        <input type="text" name="working_hours" id="working_hours" class="form-control" value="{{ old('working_hours') }}">
                        @error('working_hours')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="department">القسم</label>
                        <input type="text" name="department" id="department" class="form-control" value="{{ old('department') }}">
                        @error('department')
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
