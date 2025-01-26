<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Hash;
use Auth;
use App\Models\Permission;
use App\Models\PermissionRole;
class UserController extends Controller
{
    public function list()
    {

        $PermissionRole = PermissionRole::getPermission('User' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }

        $PermissionAdd = PermissionRole::getPermission('Add User' , Auth::user()->role_id); 
        $PermissionEdit= PermissionRole::getPermission('Edit User' , Auth::user()->role_id); 
        $PermissionDelete = PermissionRole::getPermission('Delete User' , Auth::user()->role_id); 
        $getRecord = User::getRecord();
         return view('panel.user.list' ,  [
            'PermissionAdd' => $PermissionAdd ,
            'PermissionEdit' => $PermissionEdit , 
            'PermissionDelete' => $PermissionDelete ,
            'getRecord' => $getRecord

         ]);
    }

    public function add()
    {
        $PermissionRole = PermissionRole::getPermission('Add User' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }

        $data['getRole'] = Role::getRecord();
         return view('panel.user.add' ,$data);
    }
    public function edit($id){
        $PermissionRole = PermissionRole::getPermission('Edit User' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }

        $data['getRecord'] = User::getSingle($id);
        $data['getRole']  =  Role::getRecord();
        return view('panel.user.edit' , $data);
        }    
    

    public function insert(Request $request){

        $PermissionRole = PermissionRole::getPermission('Add User' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }

        request()->validate([
            'email' => 'required|email|unique:users' ,
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password =  Hash::make($request->password);
        $user->role_id = trim($request->role_id);
        $user->save();
    
        return redirect('panel/user')->with('success' ,  "User successfully created");
    }



    public function update(Request $request, $id)
{
    $PermissionRole = PermissionRole::getPermission('Edit Role' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }

    request()->validate([
        'email' => 'required|email|unique:users,email,' . $id,
    ]);

    $user = User::find($id); // البحث عن المستخدم باستخدام الـ ID
    if (!$user) {
        return redirect('panel/user')->with('error', "User not found.");
    }

    $user->name = trim($request->name);
    $user->email = trim($request->email);
    if (!empty($request->password)) {
        $user->password = Hash::make($request->password);
    }
    $user->role_id = trim($request->role_id);
    $user->save();

    return redirect('panel/user')->with('success', "User successfully updated");
}

public function delete( $id){
    $PermissionRole = PermissionRole::getPermission('Delete User' , Auth::user()->role_id); 

        if(empty($PermissionRole)){
            abort(404);
        }

    $save = User::getSingle($id);
    $save->delete();
    return redirect('panel/role')->with('success' ,  "User` successfully Delete");
}
}
