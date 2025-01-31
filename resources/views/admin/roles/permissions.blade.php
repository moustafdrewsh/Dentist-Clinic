@extends('layouts.master')

@section('title')
    إدارة الصلاحيات
@endsection

@section('css')
    <!-- يمكنك إضافة أكواد CSS الخاصة هنا إن وجدت -->
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إدارة الصلاحيات</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إدارة الصلاحيات</li>
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
                <h3 class="card-title">إضافة صلاحية جديدة</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم الصلاحية</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    @if ($languages->isNotEmpty())
                    <hr>
                    <h5>{{ __('Translation') . ' ' . __('Optional') }}</h5>
                    <div class="row">
                        @foreach ($languages as $key => $language)
                            <div class="col-md-12 form-group">
                                <label for="name_{{ $language->id }}" class="form-label">{{ $language->name }}</label> :
                                </label>
                                <input name="translations[{{ $language->id }}]" id="name_{{ $language->id }}"
                                    class="form-control" value="">
                            </div>
                        @endforeach
                    </div>
                @endif
                    <button type="submit" class="btn btn-success">إضافة صلاحية</button>
                </form>
            </div>
        </div>

        <div class="card custom-card mt-4">
            <div class="card-header">
                <h3 class="card-title">قائمة الصلاحيات</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>اسم الصلاحية</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- يمكنك إضافة أكواد JavaScript الخاصة هنا إن وجدت -->
@endsection
