<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Treatment;
use App\Models\TreatmentSession;
use Illuminate\Http\Request;

class TreatmentSessionController extends Controller
{
    public function index()
    {
        $sessions = TreatmentSession::all();
        return view('admin.dashboard.treatment-sessions.index', compact('sessions'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $treatments = Treatment::all();
        return view('admin.dashboard.treatment-sessions.create', compact('patients', 'doctors', 'treatments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'treatment_id' => 'required|exists:treatments,id',
            'session_datetime' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        TreatmentSession::create($request->all());

        return redirect()->route('treatment-sessions.index');
    }

    public function edit($id)
    {
        $session = TreatmentSession::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $treatments = Treatment::all();
        return view('admin.dashboard.treatment-sessions.edit', compact('session', 'patients', 'doctors', 'treatments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'treatment_id' => 'required|exists:treatments,id',
            'session_datetime' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $session = TreatmentSession::findOrFail($id);
        $session->update($request->all());

        return redirect()->route('treatment-sessions.index');
    }

    public function destroy($id)
    {
        $session = TreatmentSession::findOrFail($id);
        $session->delete();

        return redirect()->route('treatment-sessions.index');
    }
    public function show($id)
    {
   
        $session = TreatmentSession::findOrFail($id);

      
        return view('admin.dashboard.treatment-sessions.show', compact('session'));
    }
}
