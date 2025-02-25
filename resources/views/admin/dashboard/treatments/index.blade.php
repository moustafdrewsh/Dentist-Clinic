@extends('layouts.master')

@section('title', 'إدارة العلاجات')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إدارة العلاجات</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إدارة العلاجات</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">العلاجات</h3>
                <a href="{{ route('treatments.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> إضافة علاج جديد
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>المعرف</th>
                            <th>اسم العلاج</th>
                            <th>التكلفة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($treatments as $treatment)
                        <tr>
                            <td>{{ $treatment->id }}</td>
                            <td>{{ $treatment->treatment_name }}</td>
                            <td>{{ $treatment->cost }}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ route('treatments.show', $treatment->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('treatments.edit', $treatment->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
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
