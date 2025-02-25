@extends('layouts.master')

@section('title')
    إضافة مستخدم جديد
@endsection

@section('css')
    <!-- يمكنك إضافة أكواد CSS الخاصة هنا إن وجدت -->
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إضافة مستخدم جديد</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">إدارة المستخدمين</a></li>
                <li class="breadcrumb-item active" aria-current="page">إضافة مستخدم جديد</li>
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
                <h3 class="card-title">إضافة مستخدم جديد</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <label for="role">الدور</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="Patient" {{ old('role') == 'Patient' ? 'selected' : '' }}>مريض</option>
                            <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>طبيب</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>موظف</option>
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="google_id">معرف جوجل</label>
                        <input type="text" class="form-control" id="google_id" name="google_id" value="{{ old('google_id') }}">
                    </div>
                    <div class="form-group">
                        <label for="facebook_id">معرف فيسبوك</label>
                        <input type="text" class="form-control" id="facebook_id" name="facebook_id" value="{{ old('facebook_id') }}">
                    </div>
                    <div class="form-group">
                        <label for="whatsapp_number">رقم الواتساب</label>
                        <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number') }}">
                    </div> --}}
                    <button type="submit" class="btn btn-success">إضافة</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            if (!confirm('هل أنت متأكد من إضافة هذا المستخدم؟')) {
                event.preventDefault();
            }
        });
    </script>
@endsection
