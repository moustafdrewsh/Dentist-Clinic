@extends('layouts.master')

@section('title')
    إعدادات النظام
@endsection

@section('css')
    <!-- يمكنك إضافة أكواد CSS الخاصة هنا إن وجدت -->
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إعدادات النظام</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إعدادات البريد و Twilio</li>
            </ol>
        </div> 
    </div>
    <!-- PAGE-HEADER END -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mt-4"> <!-- عمود SMTP -->
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">إعدادات SMTP</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="mail_mailer" class="form-label">Mail Mailer</label>
                        <input type="text" name="mail_mailer" value="{{ old('mail_mailer', $settings->mail_mailer ?? '') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="mail_host" class="form-label">Mail Host</label>
                        <input type="text" name="mail_host" value="{{ old('mail_host', $settings->mail_host ?? '') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="mail_port" class="form-label">Mail Port</label>
                        <input type="number" name="mail_port" value="{{ old('mail_port', $settings->mail_port ?? '') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="mail_username" class="form-label">Mail Username</label>
                        <input type="text" name="mail_username" value="{{ old('mail_username', $settings->mail_username ?? '') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="mail_password" class="form-label">Mail Password</label>
                        <input type="password" name="mail_password" value="{{ old('mail_password', $settings->mail_password ?? '') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="mail_from_address" class="form-label">Mail From Address</label>
                        <input type="email" name="mail_from_address" value="{{ old('mail_from_address', $settings->mail_from_address ?? '') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="mail_from_name" class="form-label">Mail From Name</label>
                        <input type="text" name="mail_from_name" value="{{ old('mail_from_name', $settings->mail_from_name ?? '') }}" class="form-control" required>
                    </div>
            </div>
        </div>
    </div>
    
    
    <div class="col-lg-6 mt-4"> <!-- عمود Twilio -->
        <div class="card custom-card">
            
            <div class="card-header">
                <h3 class="card-title">إعدادات Pusher</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="pusher_app_id" class="form-label">Pusher App ID</label>
                    <input type="text" name="pusher_app_id" value="{{ old('pusher_app_id', $settings->pusher_app_id ?? '') }}" class="form-control" required>
                </div>
    
                <div class="mb-3">
                    <label for="pusher_app_key" class="form-label">Pusher App Key</label>
                    <input type="text" name="pusher_app_key" value="{{ old('pusher_app_key', $settings->pusher_app_key ?? '') }}" class="form-control" required>
                </div>
    
                <div class="mb-3">
                    <label for="pusher_app_secret" class="form-label">Pusher App Secret</label>
                    <input type="text" name="pusher_app_secret" value="{{ old('pusher_app_secret', $settings->pusher_app_secret ?? '') }}" class="form-control" required>
                </div>
    
                <div class="mb-3">
                    <label for="pusher_app_cluster" class="form-label">Pusher App Cluster</label>
                    <input type="text" name="pusher_app_cluster" value="{{ old('pusher_app_cluster', $settings->pusher_app_cluster ?? '') }}" class="form-control" required>
                </div>
            </div>
            <div class="card-header">
                <h3 class="card-title">إعدادات Slack</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="slack_webhook_url" class="form-label">Slack Webhook URL</label>
                    <input type="text" name="slack_webhook_url" value="{{ old('slack_webhook_url', $settings->slack_webhook_url ?? '') }}" class="form-control" required>
                </div>
                
    
               
            </div>
            <div class="card-header">
                <h3 class="card-title">إعدادات Twilio</h3>
            </div>
            <div class="card-body">
                    <div class="mb-3">
                        <label for="twilio_sid" class="form-label">Twilio SID</label>
                        <input type="text" name="twilio_sid" value="{{ old('twilio_sid', $settings->twilio_sid ?? '') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="twilio_auth_token" class="form-label">Twilio Auth Token</label>
                        <input type="text" name="twilio_auth_token" value="{{ old('twilio_auth_token', $settings->twilio_auth_token ?? '') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="twilio_phone_number" class="form-label">Twilio Phone Number</label>
                        <input type="text" name="twilio_phone_number" value="{{ old('twilio_phone_number', $settings->twilio_phone_number ?? '') }}" class="form-control" required>
                    </div>
                    
                  
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">حفظ الإعدادات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- يمكنك إضافة أكواد JavaScript الخاصة هنا إن وجدت -->
@endsection
