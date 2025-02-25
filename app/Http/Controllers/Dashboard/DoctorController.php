<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    
    public function index()
    {
        return view('admin.dashboard.doctors.index', ['doctors' => Doctor::all()]);
    }

 
    public function create()
    {
        $users = User::role('doctor')->get(); 
        return view('admin.dashboard.doctors.create', compact('users'));
    }

    
    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id', 
        'specialization' => 'required|string|max:255',
        'years_of_experience' => 'required|integer|min:0',
        'working_hours' => 'required|string|max:255',
        'department' => 'nullable|string|max:255',
    ]);

    
    $user = User::findOrFail($request->user_id);
    if (!$user->hasRole('doctor')) {
        return redirect()->route('doctors.create')->withErrors(['user_id' => 'المستخدم المحدد ليس طبيبًا']);
    }

    
    Doctor::create([
        'user_id' => $user->id,
        'specialization' => $request->specialization,
        'working_hours' => $request->working_hours,
        'years_of_experience' => $request->years_of_experience,
        'department' => $request->department,
    ]);

    return redirect()->route('doctors.index');
}


   
    public function edit(Doctor $doctor)
    {
        $users = User::role('doctor')->get(); 
        return view('admin.dashboard.doctors.edit', compact('doctor', 'users'));
    }

    
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialization' => 'required|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'working_hours' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
        ]);
    
        $doctor->update([
            'user_id' => $request->user_id,
            'specialization' => $request->specialization,
            'working_hours' => $request->working_hours,
            'years_of_experience' => $request->years_of_experience,
            'department' => $request->department,
        ]);
    
        return redirect()->route('doctors.index');
    }
    
    

   
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index');
    }

   
    public function show(Doctor $doctor)
    {
        return view('admin.dashboard.doctors.show', compact('doctor'));
    }
}

