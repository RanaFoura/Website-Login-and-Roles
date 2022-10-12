<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permissions.index')->with('permissions',Permission::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
        ]);

        $namenw = preg_replace('/[^a-zA-Z0-9]/', '', $request->name);
        $permission = Permission::create([
            'name' => $namenw,
            'display_name' => $request->display_name, // optional
            'description' => $request->description, // optional
        ]);
        return view('permissions.index')->with('permissions',Permission::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission= Permission::find($id);
        return view('permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission= Permission::find($id);
        return view('permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);

        $this->validate($request,[
            "name" => "required",
        ]);

        $namenw = preg_replace('/[^a-zA-Z0-9]/', '', $request->name);

        $permission->name=$namenw;
        $permission->display_name=$request->display_name;
        $permission->description=$request->description;
        $permission->save();

        $permission= Permission::find($id);
        return view('permissions.show')->with('permission', $permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return view('permissions.index')->with('permissions',Permission::all());
    }
}
