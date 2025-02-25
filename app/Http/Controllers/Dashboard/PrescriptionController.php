<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::all();
        return view('admin.dashboard.prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $medications = Medication::all();
        return view('admin.dashboard.prescriptions.create', compact('patients', 'doctors', 'medications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'medication_id' => 'required|exists:medications,id',
            'dosage' => 'required|string',
            'issued_date' => 'required|date',
        ]);

        Prescription::create($request->all());

        return redirect()->route('prescriptions.index');
    }

    public function edit($id)
    {
        $prescription = Prescription::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $medications = Medication::all();
        return view('admin.dashboard.prescriptions.edit', compact('prescription', 'patients', 'doctors', 'medications'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dosage' => 'required|string',
            'issued_date' => 'required|date',
        ]);

        $prescription = Prescription::findOrFail($id);
        $prescription->update($request->all());

        return redirect()->route('prescriptions.index');
    }

    public function destroy($id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->delete();

        return redirect()->route('  .index');
    }
    public function show($id)
    {
       
        $prescription = Prescription::with(['patient.user', 'doctor.user', 'medication'])->findOrFail($id);

       
        return view('admin.dashboard.prescriptions.show', compact('prescription'));
    }
    
}
