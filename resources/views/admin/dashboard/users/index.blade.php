@extends('layouts.master')

@section('title')
    إدارة المستخدمين
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إدارة المستخدمين</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إدارة المستخدمين</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">المستخدمين</h3>
                <a href="{{ route('users.create') }}" class="btn btn-primary">
                    <i class="fa fa-user-plus"></i> إضافة مستخدم جديد
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>المعرف</th>
                            <th>الاسم الكامل</th>
                            <th>البريد الإلكتروني</th>
                            <th>الدور</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{ $role->name }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td class="d-flex justify-content-center gap-2">
                                <!-- زر التعديل -->
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <!-- زر الحذف -->
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- يمكنك إضافة أكواد JavaScript الخاصة هنا إن وجدت -->
@endsection
