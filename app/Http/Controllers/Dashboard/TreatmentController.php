<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::all();
        return view('admin.dashboard.treatments.index', compact('treatments'));
    }

    public function create()
    {
        return view('admin.dashboard.treatments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'treatment_name' => 'required|string',
            'description' => 'nullable|string',
            'cost' => 'required|numeric',
        ]);

        Treatment::create($request->all());

        return redirect()->route('treatments.index');
    }

    public function edit($id)
    {
        $treatment = Treatment::findOrFail($id);
        return view('admin.dashboard.treatments.edit', compact('treatment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'treatment_name' => 'required|string',
            'description' => 'nullable|string',
            'cost' => 'required|numeric',
        ]);

        $treatment = Treatment::findOrFail($id);
        $treatment->update($request->all());

        return redirect()->route('treatments.index');
    }

    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->delete();

        return redirect()->route('treatments.index');
    }
    public function show($id)
{
    
    $treatment = Treatment::findOrFail($id);
    
   
    return view('admin.dashboard.treatments.show', compact('treatment'));
}

}
