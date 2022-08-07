<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:Show permissions', ['only' => ['index']]);
        $this->middleware('permission:Add permissions', ['only' => ['create', 'store']]);
        $this->middleware('permission:Update permissions', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete permissions', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $roles = Role::select('id', 'name')->orderBy('id', 'asc')->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::select('id', 'name')->orderBy('id', 'ASC')->get();
        return view('admin.roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {

                $this->validate($request, [
                    'name' => 'required|unique:roles,name',
                    'permission' => 'required',
                ]);
                $role = Role::create(['name' => Purify::clean($request->name)]);
                $role->syncPermissions($request->permission);
            });
            Session::flash('status', true);
            return redirect()->route('roles.index');
        } catch (\Throwable $e) {
            Session::flash('status', false);
            return back();
        }
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::orderBy('id', 'ASC')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        try {

            DB::transaction(function () use ($request, $id) {
                $this->validate($request, [
                    'name' => 'required',
                    'permission' => 'required',
                ]);
                $role = Role::find($id);
                $role->name = Purify::clean($request->name);
                $role->save();
                $role->syncPermissions($request->permission);
            });
            Session::flash('status', true);
            return redirect()->route('roles.index');
        } catch (\Throwable $e) {
            Session::flash('status', false);
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $role = DB::table("roles")->where('id', $id)->select('id','name','created_at','updated_at')->get();
                if($role){
                  DB::table("roles")->where('id', $id)->delete();
              }
            });
            Session::flash('status', true);
            return redirect()->route('roles.index');
        } catch (\Throwable $e) {
            Session::flash('status', false);
            return back();
        }
    }
}
