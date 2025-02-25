@extends('layouts.master')

@section('title')
    تعديل بيانات المستخدم
@endsection

@section('css')
    <!-- يمكنك إضافة أكواد CSS الخاصة هنا إن وجدت -->
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تعديل بيانات المستخدم</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل بيانات المستخدم</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تعديل بيانات المستخدم</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">الاسم الكامل</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="role">الدور</label>
                        <select class="form-control" id="role" name="role">
                            <option value="Patients" {{ $user->role == 'Patients' ? 'selected' : '' }}>مريض</option>
                            <option value="doctor" {{ $user->role == 'doctor' ? 'selected' : '' }}>طبيب</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>موظف</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small>إذا كنت لا ترغب في تغيير كلمة المرور، يمكنك ترك هذا الحقل فارغاً.</small>
                    </div>

                    <button type="submit" class="btn btn-success">تحديث</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- يمكنك إضافة أكواد JavaScript الخاصة هنا إن وجدت -->
@endsection
