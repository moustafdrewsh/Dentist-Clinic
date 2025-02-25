@extends('layouts.master')

@section('title')
    حذف المستخدم
@endsection

@section('css')
    <!-- يمكنك إضافة أكواد CSS الخاصة هنا إن وجدت -->
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">حذف المستخدم</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">إدارة المستخدمين</a></li>
                <li class="breadcrumb-item active" aria-current="page">حذف المستخدم</li>
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
                <h3 class="card-title">تأكيد الحذف</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>هل أنت متأكد من أنك تريد حذف المستخدم <strong>{{ $user->name }}</strong>؟</p>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-danger">نعم، احذف</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            if (!confirm('هل أنت متأكد من حذف هذا المستخدم؟ لا يمكن التراجع عن هذا الإجراء!')) {
                event.preventDefault();
            }
        });
    </script>
@endsection
