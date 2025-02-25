<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;

class PatientController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.patients.index', ['patients' => Patient::all()]);
    }

    public function create()
    {
        $users = User::role('patient')->get(); 
        $doctors = Doctor::with('user')->get();
        return view('admin.dashboard.patients.create', compact('users', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'registration_date' => 'required|date',
        ]);
        
        $user = User::findOrFail($request->user_id);
        if (!$user->hasRole('patient')) {
            return redirect()->route('patients.create')->withErrors(['user_id' => 'المستخدم المحدد ليس مريضًا']);
        }

        Patient::create($request->all());
        return redirect()->route('patients.index');
    }

    public function edit(Patient $patient)
    {
        $users = User::role('patient')->get(); 
        return view('admin.dashboard.patients.edit', compact('patient', 'users')); 
    }
    

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'registration_date' => 'required|date',
        ]);

        $user = $patient->user;
        if (!$user->hasRole('patient')) {
            return redirect()->route('patients.index')->withErrors(['user_id' => 'المستخدم المحدد ليس مريضًا']);
        }

        $patient->update($request->all());
        return redirect()->route('patients.index');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index');
    }
    public function show(Patient $patient)
{
    return view('admin.dashboard.patients.show', compact('patient'));
}

}
