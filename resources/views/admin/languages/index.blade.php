@extends('layouts.master')

@section('title')
    إدارة اللغات
@endsection

@section('css')
    <!-- يمكنك إضافة أكواد CSS الخاصة هنا إن وجدت -->
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إدارة اللغات</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إدارة اللغات</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">Default Language</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('set.default.language') }}" method="POST" class="d-flex align-items-center">
                    @csrf
                    <select class="form-control me-2" name="language_code">
                        @foreach ($languages as $language)
                            <option value="{{ $language->code }}" {{ session('default_locale') == $language->code ? 'selected' : '' }}>
                                {{ $language->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">Import App Translations</h3>
            </div>
            <div class="card-body d-flex align-items-center">
                <form action="{{ route('importAppLanguageFile') }}" method="POST" enctype="multipart/form-data" class="d-flex w-100">
                    @csrf
                    <input type="file" name="app_file" class="form-control me-2" required style="flex: 1;">
                    {{-- <input type="hidden" name="language_id" value="{{ $language->id }}"> --}}
                    <button class="btn btn-primary" type="submit">Import</button>
                </form>
            </div>
        </div>
    </div>


</div>
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">اللغات</h3>
                <a href="{{ route('languages.create') }}" class="btn btn-primary">إضافة لغة جديدة</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>المعرف</th>
                            <th>اسم اللغة</th>
                            <th>الرمز</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($languages as $language)
                        <tr>
                            <td>{{ $language->id }}</td>
                            <td>{{ $language->name }}</td>
                            <td>{{ $language->code }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('languages.edit', $language->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                                <form action="{{ route('languages.destroy', $language->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
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
