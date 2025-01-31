@extends('layouts.master')

@section('title')
    إعدادات الإشعارات
@endsection

@section('css')
    <style>
        .notification-button {
            font-size: 18px;
            padding: 15px;
            width: 100%;
            margin-bottom: 10px;
            text-align: center;
        }

        .collapse {
            margin-top: 20px;
        }
    </style>
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إعدادات الإشعارات</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إعدادات الإشعارات</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card custom-card">
                <div class="card-header">
                    <h3 class="card-title">تحديث إعدادات الإشعارات</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.notifications.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <div class="row">
                                @foreach ($notificationTypes as $notificationType)
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-info notification-button toggle-settings"
                                            data-target="#settings-{{ $notificationType->id }}">
                                            {{ $notificationType->name }}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        @foreach ($notificationTypes as $notificationType)
                            <div id="settings-{{ $notificationType->id }}" class="collapse mt-4">
                                @if ($notificationType->notificationSettings && $notificationType->notificationSettings->isNotEmpty())
                                    @foreach ($notificationType->notificationSettings as $setting)
                                        <div class="flex items-center">
                                            <!-- حقل مخفي لإرسال قيمة 0 عند إلغاء التحديد -->
                                            <input type="hidden" name="notifications[{{ $setting->notification_type_id }}]"
                                                value="0">

                                            <!-- checkbox يتم تحديده إذا كان مفعلاً -->
                                            <input type="checkbox"
                                                name="notifications[{{ $setting->notification_type_id }}]" value="1"
                                                @if ($setting->enabled) checked @endif>
                                            <label class="ml-2">{{ $setting->notification_type }}</label>
                                        </div>
                                    @endforeach
                                @else
                                    <p>لا توجد إعدادات إشعارات لهذا النوع.</p>
                                @endif
                            </div>
                        @endforeach


                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-success">تحديث الإعدادات</button>

                            <a href="{{ route('admin.notifications.test') }}" class="btn btn-secondary">
                                email تجريب
                            </a>

                            <a href="{{ route('admin.notifications.testsms') }}" class="btn btn-secondary">
                                sms تجريب
                            </a>

                            <a href="{{ route('admin.notifications.testslack') }}" class="btn btn-secondary">
                                slack تجريب
                            </a>
                            <a href="{{ route('admin.notifications.testpusher') }}" class="btn btn-secondary">
                                pusher تجريب
                            </a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
