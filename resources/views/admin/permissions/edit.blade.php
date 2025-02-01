@extends('layouts.master')

@section('title', 'تعديل الصلاحية')

@section('page-header')
<div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
    <h1 class="page-title">تعديل الصلاحية</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">إدارة الصلاحيات</a></li>
        <li class="breadcrumb-item active" aria-current="page">تعديل الصلاحية</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تعديل الصلاحية</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">اسم الصلاحية</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}" required>
                    </div>

                    <!-- عرض الترجمات إن وجدت -->
                    @if ($languages->isNotEmpty())
                    <hr>
                    <h5>{{ __('Translation') . ' ' . __('Optional') }}</h5>
                    <div class="row">
                        @foreach ($languages as $language)
                            <div class="col-md-12 form-group">
                                <label for="name_{{ $language->id }}" class="form-label">{{ $language->name }}</label>
                                <input name="translations[{{ $language->id }}]" id="name_{{ $language->id }}" class="form-control"
                                    value="{{ $translations[$language->id] ?? '' }}">
                            </div>
                        @endforeach
                    </div>
                @endif
                

                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                    <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">إلغاء</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
