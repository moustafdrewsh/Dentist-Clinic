@extends('layouts.master')

@section('title')
    إعدادات Socialite
@endsection

@section('css')
    <!-- يمكنك إضافة أكواد CSS الخاصة هنا إن وجدت -->
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إعدادات Socialite</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إعدادات Google و Facebook</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 mt-4"> <!-- إعدادات Google و Facebook في نفس النموذج -->
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">إعدادات Google و Facebook</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.socialite-settings.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- إعدادات Google -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="google_client_id" class="form-label">Google Client ID</label>
                                <input type="text" name="google_client_id" value="{{ old('google_client_id', $settings->google_client_id ?? '') }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="google_client_secret" class="form-label">Google Client Secret</label>
                                <input type="text" name="google_client_secret" value="{{ old('google_client_secret', $settings->google_client_secret ?? '') }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="google_callback_redirect" class="form-label">Google Callback Redirect</label>
                                <input type="url" name="google_callback_redirect" value="{{ old('google_callback_redirect', $settings->google_callback_redirect ?? '') }}" class="form-control" required>
                            </div>
                        </div>

                        <!-- إعدادات Facebook -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="facebook_client_id" class="form-label">Facebook Client ID</label>
                                <input type="text" name="facebook_client_id" value="{{ old('facebook_client_id', $settings->facebook_client_id ?? '') }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="facebook_client_secret" class="form-label">Facebook Client Secret</label>
                                <input type="text" name="facebook_client_secret" value="{{ old('facebook_client_secret', $settings->facebook_client_secret ?? '') }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="facebook_callback_redirect" class="form-label">Facebook Callback Redirect</label>
                                <input type="url" name="facebook_callback_redirect" value="{{ old('facebook_callback_redirect', $settings->facebook_callback_redirect ?? '') }}" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">حفظ الإعدادات</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- يمكنك إضافة أكواد JavaScript الخاصة هنا إن وجدت -->
@endsection
