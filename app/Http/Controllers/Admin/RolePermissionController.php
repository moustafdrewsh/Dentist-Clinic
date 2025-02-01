<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Permission as ModelsPermission;
use App\Models\PermissionTranslations;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('role:admin');
    // }

    public function index()
    {
        // جلب الأدوار مع الصلاحيات المرتبطة بها
        $roles = Role::with('permissions')->get();

        // جلب جميع الصلاحيات إذا أردت عرضها بشكل منفصل أو لفلترة الصلاحيات
        $permissions = Permission::all();

        // عرض البيانات في صفحة العرض
        return view('admin.roles.index', compact('roles', 'permissions'));
    }


    public function createRole()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('admin.roles.create', compact('permissions', 'roles'));
    }


    public function storeRole(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array', // التأكد من أن المستخدم يختار صلاحيات
            'permissions.*' => 'exists:permissions,id', // التأكد من أن كل صلاحية موجودة في قاعدة البيانات
        ]);

        // إنشاء الدور
        $role = Role::create([
            'name' => $request->name
        ]);

        // ربط الصلاحيات بالدور
        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();

            if ($permissions->count() === count($request->permissions)) {
                $role->givePermissionTo($permissions);
            } else {
                return redirect()->back()->withErrors(['permissions' => 'إحدى الصلاحيات غير موجودة.']);
            }
        }

        // إعادة التوجيه مع رسالة النجاح
        return redirect()->route('admin.roles.index')->with('success', 'تم إنشاء الدور بنجاح.');
    }
    public function editRole($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function updateRole(Request $request, $id)
    {
        // التحقق من أن الصلاحيات تم تحديدها
        $request->validate([
            'permissions' => 'required|array', // التأكد من أن الصلاحيات تم تحديدها
            'permissions.*' => 'exists:permissions,id', // التأكد من أن كل صلاحية موجودة في قاعدة البيانات
        ]);

        // العثور على الدور بناءً على المعرف
        $role = Role::find($id);

        // التأكد من أن الدور موجود
        if (!$role) {
            return redirect()->route('admin.roles.index')->withErrors(['role' => 'الدور غير موجود.']);
        }

        // الحصول على الصلاحيات المحددة والتأكد من أنها موجودة في قاعدة البيانات
        $permissions = Permission::whereIn('id', $request->permissions)->get();

        // التحقق من أن جميع الصلاحيات موجودة
        if ($permissions->count() === count($request->permissions)) {
            // تحديث الصلاحيات بالدور
            $role->syncPermissions($permissions);
        } else {
            return redirect()->back()->withErrors(['permissions' => 'إحدى الصلاحيات غير موجودة.']);
        }

        // إعادة التوجيه مع رسالة النجاح
        return redirect()->route('admin.roles.index')->with('success', 'تم تحديث الدور بنجاح.');
    }

    public function destroyRole($id)
    {
        $role = Role::findOrFail($id);

        $role->permissions()->detach(); // فك الارتباط بين الدور والصلاحيات في جدول role_has_permissions

        // حذف الدور نفسه
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'تم حذف الدور بنجاح دون التأثير على الصلاحيات.');
    }




    //  permissions


    public function permissions()
    {
        $roles = Role::all();
        $languages = Language::where('code', '!=', 'en')->get();
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions', 'roles', 'languages'));
    }

    public function storePermission(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        // إنشاء الصلاحية
        $permission = ModelsPermission::create([
            'name' => $request->name,
        ]);

        // حفظ الترجمات إن وجدت
        if (!empty($request->translations)) {
            foreach ($request->translations as $languageId => $name) {
                if (!empty($name)) {
                    PermissionTranslations::create([
                        'permission_id' => $permission->id,
                        'language_id'   => $languageId,
                        'name'          => $name,
                    ]);
                }
            }
        }

        return redirect()->route('admin.permissions.index')->with('success', 'تم إنشاء الصلاحية بنجاح.');
    }



    public function editPermission($id)
    {
        $permission = ModelsPermission::with('translations')->findOrFail($id);
        $languages = Language::where('code', '!=', 'en')->get();
    
        // تجهيز الترجمات في مصفوفة ليسهل الوصول إليها
        $translations = $permission->translations->pluck('name', 'language_id')->toArray();
    
        return view('admin.permissions.edit', compact('permission', 'languages', 'translations'));
    }
    
    public function updatePermission(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);

        // تحديث اسم الصلاحية
        $permission = ModelsPermission::findOrFail($id);
        $permission->update([
            'name' => $request->name,
        ]);

        // تحديث الترجمات إن وجدت
        if (!empty($request->translations)) {
            foreach ($request->translations as $languageId => $name) {
                if (!empty($name)) {
                    PermissionTranslations::updateOrCreate(
                        [
                            'permission_id' => $permission->id,
                            'language_id' => $languageId
                        ],
                        [
                            'name' => $name
                        ]
                    );
                }
            }
        }

        return redirect()->route('admin.permissions.index')->with('success', 'تم تحديث الصلاحية بنجاح.');
    }


    public function destroyPermission($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->roles()->detach();
        PermissionTranslations::where('permission_id', $id)->delete();
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('success', 'تم حذف الصلاحية بنجاح.');
    }
}
