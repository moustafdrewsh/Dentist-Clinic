<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.dashboard.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.dashboard.departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.dashboard.departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department_name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index');
    }
    public function show($id)
{
    
    $department = Department::findOrFail($id);
    

    return view('admin.dashboard.departments.show', compact('department'));
}
}
