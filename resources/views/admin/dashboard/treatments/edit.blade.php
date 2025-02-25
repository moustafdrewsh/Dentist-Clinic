@extends('layouts.master')

@section('title', 'تعديل العلاج')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تعديل العلاج</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('treatments.index') }}">إدارة العلاجات</a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل العلاج</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تعديل العلاج</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('treatments.update', $treatment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="treatment_name">اسم العلاج</label>
                        <input type="text" id="treatment_name" name="treatment_name" class="form-control" value="{{ $treatment->treatment_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea id="description" name="description" class="form-control">{{ $treatment->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cost">التكلفة</label>
                        <input type="number" id="cost" name="cost" class="form-control" value="{{ $treatment->cost }}" required step="0.01">
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">تحديث</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
