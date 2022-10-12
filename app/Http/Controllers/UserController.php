<?php

namespace App\Http\Controllers;

Use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()

    {
        return view('users.index')->with('users',User::all());

    }

    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make('password')
        ]);

        return view('users.index')->with('users',User::all());
    }

    public function show($id)
    {
        $roles = Role::all();
        $role_ids = DB::table('role_user')->select('role_id')->where(['user_id' => $id])->get()->pluck('role_id')->toArray();
        $user = User::find($id);
        return view('users.show', [
            'user'      => $user,
            'roles'     => $roles,
            'role_ids'  => $role_ids
        ]);
    }

    public function edit($id)
    {
        
        $roles = Role::all();
        $role_ids = DB::table('role_user')->select('role_id')->where(['user_id' => $id])->get()->pluck('role_id')->toArray();

        $user=User::find($id);
        return view('users.edit', [
            'user'      => $user,
            'roles'     => $roles,
            'role_ids'  => $role_ids
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required|unique:users,email,'.$id."'",
        ]);

        $user=User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        DB::table('role_user')->where(['user_id' => $user->id])->delete();

        foreach($request->all() as $key => $val)
        {
            if(substr($key, 0, 5) === 'role_')
            {
                $role = substr($key, 5);
                $roleRecord = Role::where(['name' => $role])->get();

                if(count($roleRecord))
                {
                    if($val) $user->attachRole($roleRecord[0]);
                }
            }
        }
        $user = User::find($id);

        return redirect(route('user.show', $user));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete($id);
        return view('users.index')->with('users',User::all());
    }


    public function banned()
    {
              $users = User::onlyTrashed()->get();
              return view('users.banned')->with('users',$users);
    }

    public function hdelete($id)
    {
        $user = User::withTrashed()->where('id',$id)->first();
        $user->forceDelete();
        return redirect()->route('banned');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id',$id)->first();
        $user->restore();
        return redirect()->route('banned');
    }

}
