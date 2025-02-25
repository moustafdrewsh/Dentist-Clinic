<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    public function index()
    {
        $medications = Medication::all();
        return view('admin.dashboard.medications.index', compact('medications'));
    }

    public function create()
    {
        return view('admin.dashboard.medications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'medication_name' => 'required|string',
            'description' => 'nullable|string',
            'dosage' => 'required|string',
        ]);

        Medication::create($request->all());

        return redirect()->route('medications.index');
    }

    public function edit($id)
    {
        $medication = Medication::findOrFail($id);
        return view('admin.dashboard.medications.edit', compact('medication'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'medication_name' => 'required|string',
            'description' => 'nullable|string',
            'dosage' => 'required|string',
        ]);

        $medication = Medication::findOrFail($id);
        $medication->update($request->all());

        return redirect()->route('medications.index');
    }

    public function destroy($id)
    {
        $medication = Medication::findOrFail($id);
        $medication->delete();

        return redirect()->route('medications.index');
    }
    public function show($id)
{
  
    $medication = Medication::findOrFail($id);

    return view('admin.dashboard.medications.show', compact('medication'));
}

}
