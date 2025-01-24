<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Auth;
use App\Models\Permission;
use App\Models\PermissionRole;
class PermissionController extends Controller
{
    // عرض جميع الصلاحيات
    public function index()
    {

        $PermissionRole = PermissionRole::getPermission('Permissions' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }
        $date['PermissionAdd'] = PermissionRole::getPermission('Add Permissions' , Auth::user()->role_id); 
        $date['PermissionEdit']= PermissionRole::getPermission('Edit Permissions' , Auth::user()->role_id); 
        $date['PermissionDelete'] = PermissionRole::getPermission('Delete Permissions' , Auth::user()->role_id); 

        $permissions = Permission::all();
        return view('panel.permissions.index', compact('permissions'));
    }

    // عرض صفحة إضافة صلاحية جديدة
    public function create()
    {
        $PermissionRole = PermissionRole::getPermission('Add Permissions' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }
        return view('panel.permissions.create');
    }

    // إضافة صلاحية جديدة
    public function store(Request $request)
    {
        $PermissionRole = PermissionRole::getPermission('Add Permissions' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'groupby' => 'required|integer',
        ]);

        Permission::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'groupby' => $request->groupby,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('permissions.index')->with('success', 'تم إضافة الصلاحية بنجاح');
    }

    // عرض صفحة تعديل الصلاحية
    public function edit($id)
    {
        $PermissionRole = PermissionRole::getPermission('Edit Permissions' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }
        $permission = Permission::findOrFail($id);
        return view('panel.permissions.edit', compact('permission'));
    }

    // تحديث الصلاحية
    public function update(Request $request, $id)
    {
        $PermissionRole = PermissionRole::getPermission('Edit Permissions' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'groupby' => 'required|integer',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'groupby' => $request->groupby,
            'updated_at' => now(),
        ]);

        return redirect()->route('permissions.index')->with('success', 'تم تحديث الصلاحية بنجاح');
    }

    // حذف الصلاحية
    public function destroy($id)
    {
        $PermissionRole = PermissionRole::getPermission('Delete Permissions' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'تم حذف الصلاحية بنجاح');
    }
}
