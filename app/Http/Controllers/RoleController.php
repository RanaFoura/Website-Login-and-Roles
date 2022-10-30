<?php

namespace App\Http\Controllers;

Use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index')->with('roles',Role::all());
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|unique:roles',
        ]);

        $namenw = preg_replace('/[^a-zA-Z0-9]/', '', $request->name);
        $role = Role::create([
            'name' => $namenw,
            'display_name' => $request->display_name, // optional
            'description' => $request->description, // optional
        ]);
        return view('roles.index')->with('roles',Role::all());

    }

    public function show($id)
    {
        $role= Role::find($id);
        $permission_ids = DB::table('permission_role')->select('permission_id')->where(['role_id' => $role->id])->get()->pluck('permission_id')->toArray();
        $permissions = Permission::all();

        return view('roles.show', [
            'role'              => $role,
            'permissions'       => $permissions,
            'permission_ids'    => $permission_ids,
        ]);
    }

    public function edit($id)
    {
        $role= Role::find($id);
        $permission_ids = DB::table('permission_role')->select('permission_id')->where(['role_id' => $role->id])->get()->pluck('permission_id')->toArray();
        $permissions = Permission::all();

        return view('roles.edit', [
            'role'              => $role,
            'permissions'       => $permissions,
            'permission_ids'    => $permission_ids,
        ]);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            "name" => 'required|unique:roles,name,'.$id."'",
        ]);
        $role = Role::find($id);

        
        $namenw=preg_replace('/[^a-zA-Z0-9]/', '', $request->input('name'));
        $role->name = $namenw;
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        DB::table('permission_role')->where(['role_id' => $role->id])->delete();

        foreach($request->all() as $key => $val)
        {
            if(substr($key, 0, 11) === 'permission_')
            {
                $permission = substr($key, 11);
                $permissionRecord = Permission::where(['name' => $permission])->get();

                if(count($permissionRecord))
                {
                    if($val) $role->attachPermission($permissionRecord[0]);
                }
            }
        }

                $role = Role::find($id);

        return redirect(route('role.show', $role));

    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return view('roles.index')->with('roles',Role::all());
    }


}
