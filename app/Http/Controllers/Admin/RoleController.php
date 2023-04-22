<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        View::share('title', 'Roles');
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.pages.roles.index', [
                'roles' => $roles,
        ]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return \view('admin.pages.roles.create', [
                'permissions' => $permissions,
        ]);
    }

    public function createPermissions()
    {
        return \view('admin.pages.roles.create-permission');
    }

    public function storePermissions(Request $request)
    {
        $request->validate([
                'permission' => 'string',
        ]);
        Permission::create([
                'name' => $request->permission,
        ]);
        return redirect()->route('admin.roles.index');
    }

    public function store(Request $request)
    {
        $role = Role::create([
                'name' => $request->role_name,
        ]);

        $role->givePermissionTo($request->permission);

        return redirect()->route('admin.roles.index');

    }

    public function edit(Role $role)
    {

    }
}
