<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Patient;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        // تحميل العلاقة مع المريض والمستخدم
        $invoices = Invoice::with('patient.user')->get();
        return view('admin.dashboard.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('admin.dashboard.invoices.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required|string',
            'issued_date' => 'required|date',
            'payment_date' => 'nullable|date',
        ]);

        Invoice::create($request->all());
        return redirect()->route('invoices.index');
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $patients = Patient::all();
        return view('admin.dashboard.invoices.edit', compact('invoice', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'total_amount' => 'required|numeric',
            'payment_status' => 'required|string',
            'issued_date' => 'required|date',
            'payment_date' => 'nullable|date',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return redirect()->route('invoices.index');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index');
    }

    public function show($id)
    {
        $invoice = Invoice::with('patient.user')->findOrFail($id);
        return view('admin.dashboard.invoices.show', compact('invoice'));
    }
}
