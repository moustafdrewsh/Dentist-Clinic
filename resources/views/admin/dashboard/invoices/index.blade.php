@extends('layouts.master')

@section('title', 'إدارة الفواتير')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">إدارة الفواتير</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إدارة الفواتير</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">الفواتير</h3>
                <a href="{{ route('invoices.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> إضافة فاتورة جديدة
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>المعرف</th>
                            <th>اسم المريض</th>
                            <th>المبلغ الإجمالي</th>
                            <th>حالة الدفع</th>
                            <th>تاريخ الإصدار</th>
                            <th>تاريخ الدفع</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->patient->user->name }}</td> 
                            <td>{{ $invoice->formatCurrency($invoice->total_amount, 'SYP') }}</td> <!-- تنسيق العملة -->
                            <td>{{ ucfirst($invoice->payment_status) }}</td>
                            <td>{{ \Carbon\Carbon::parse($invoice->issued_date)->format('d-m-Y') }}</td>
                            <td>
                                {{ $invoice->payment_date ? \Carbon\Carbon::parse($invoice->payment_date)->format('d-m-Y') : 'لم يتم الدفع' }}
                            </td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
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
