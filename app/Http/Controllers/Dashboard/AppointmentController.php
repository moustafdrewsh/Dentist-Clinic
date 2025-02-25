<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['patient.user', 'doctor.user'])->get();
        return view('admin.dashboard.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::with('user')->get(); 
        $doctors = Doctor::with('user')->get();  
        return view('admin.dashboard.appointments.create', compact('patients', 'doctors'));
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_datetime' => 'required|date',
        ]);
        Appointment::create($request->all());
        return redirect()->route('appointments.index');
    }
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->appointment_datetime = Carbon::parse($appointment->appointment_datetime); // تحويل القيمة إلى Carbon

        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('admin.dashboard.appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'appointment_datetime' => 'required|date',
        ]);
        $appointment->update($request->all());
        return redirect()->route('appointments.index');
    }
    public function show($id)
{
    $appointment = Appointment::findOrFail($id);
    return view('admin.dashboard.appointments.show', compact('appointment'));
}


    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index');
    }
}
