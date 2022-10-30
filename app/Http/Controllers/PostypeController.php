<?php

namespace App\Http\Controllers;

use App\Models\Postype;
use Illuminate\Http\Request;

class PostypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('types.index')->with('types',Postype::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
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
            'name'=> 'required|unique:postypes',
        ]);

        $namenw = preg_replace('/[^a-zA-Z0-9]/', '', $request->name);
        $type = Postype::create([
            'name' => $namenw,
            'display_name' => $request->display_name, // optional
            'desc' => $request->desc, // optional
        ]);
        return view('types.index')->with('types',Postype::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postype  $postype
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type= Postype::find($id);
        return view('types.show')->with('type', $type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postype  $postype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type= Postype::find($id);
        return view('types.edit')->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postype  $postype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postype $postype)
    {
        $type = Postype::find($request->id);

        $this->validate($request,[
            "name" => 'required|unique:postypes,name,'.$request->id."'",
        ]);

        $namenw = preg_replace('/[^a-zA-Z0-9]/', '', $request->name);
        
        $type->name=$namenw;
        $type->display_name=$request->display_name;
        $type->desc=$request->desc;
        $type->save();

        $type= Postype::find($type->id);
        return view('types.show')->with('type', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postype  $postype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Postype::find($id);
        $type->delete();
        return view('types.index')->with('types',Postype::all());
    }
}

