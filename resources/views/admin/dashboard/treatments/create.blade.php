@extends('layouts.master')

@section('title', 'إضافة علاج جديد')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إضافة علاج جديد</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('treatments.index') }}">إدارة العلاجات</a></li>
                <li class="breadcrumb-item active" aria-current="page">إضافة علاج جديد</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">إضافة علاج جديد</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('treatments.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="treatment_name">اسم العلاج</label>
                        <input type="text" id="treatment_name" name="treatment_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cost">التكلفة</label>
                        <input type="number" id="cost" name="cost" class="form-control" required step="0.01">
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

