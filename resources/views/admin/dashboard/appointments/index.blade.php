@extends('layouts.master')

@section('title', 'إدارة المواعيد')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إدارة المواعيد</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إدارة المواعيد</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">المواعيد</h3>
                <a href="{{ route('appointments.create') }}" class="btn btn-primary">
                    <i class="fa fa-calendar-plus"></i> إضافة موعد جديد
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>المعرف</th>
                            <th>المريض</th>
                            <th>الطبيب</th>
                            <th>التاريخ والوقت</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->patient->user->name }}</td>
                            <td>{{ $appointment->doctor->user->name }}</td>
                            <td>{{ $appointment->appointment_datetime }}</td>
                            <td>{{ __('statuses.' . $appointment->status) }}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
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
@endsection