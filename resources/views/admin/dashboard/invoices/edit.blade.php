@extends('layouts.master')

@section('title', 'تحرير الفاتورة')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('page-header')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">تحرير الفاتورة</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">إدارة الفواتير</a></li>
                <li class="breadcrumb-item active" aria-current="page">تحرير الفاتورة</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">تحرير الفاتورة</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="patient_id">اسم المريض</label>
                        <select name="patient_id" id="patient_id" class="form-control @error('patient_id') is-invalid @enderror">
                            <option value="">اختر المريض</option>
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}" {{ old('patient_id', $invoice->patient_id) == $patient->id ? 'selected' : '' }}>
                                    {{ $patient->user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('patient_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_amount">المبلغ الإجمالي</label>
                        <input type="number" name="total_amount" id="total_amount" class="form-control @error('total_amount') is-invalid @enderror" value="{{ old('total_amount', $invoice->total_amount) }}">
                        @error('total_amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="payment_status">حالة الدفع</label>
                        <select name="payment_status" id="payment_status" class="form-control @error('payment_status') is-invalid @enderror">
                            <option value="paid" {{ old('payment_status', $invoice->payment_status) == 'paid' ? 'selected' : '' }}>مدفوع</option>
                            <option value="unpaid" {{ old('payment_status', $invoice->payment_status) == 'unpaid' ? 'selected' : '' }}>غير مدفوع</option>
                        </select>
                        @error('payment_status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="issued_date">تاريخ الإصدار</label>
                        <input type="date" name="issued_date" id="issued_date" class="form-control @error('issued_date') is-invalid @enderror" value="{{ old('issued_date', $invoice->issued_date) }}">
                        @error('issued_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="payment_date">تاريخ الدفع</label>
                        <input type="date" name="payment_date" id="payment_date" class="form-control @error('payment_date') is-invalid @enderror" value="{{ old('payment_date', $invoice->payment_date) }}">
                        @error('payment_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">تحديث الفاتورة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
