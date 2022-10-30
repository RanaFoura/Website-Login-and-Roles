<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags',Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
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
            'name'=> 'required|unique:tags',
        ]);

        $namenw = preg_replace('/[^a-zA-Z0-9]/', '', $request->name);
        $tag = Tag::create([
            'name' => $namenw,
            'display_name' => $request->display_name, // optional
            'desc' => $request->desc, // optional
        ]);
        return view('tags.index')->with('tags',Tag::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag= TAg::find($id);
        return view('tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag= Tag::find($id);
        return view('tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
      
        $tag = Tag::find($request->id);

        $this->validate($request,[
            "name" => 'required|unique:tags,name,'.$tag->id."'",
        ]);

        $namenw = preg_replace('/[^a-zA-Z0-9]/', '', $request->name);
        
        $tag->name=$namenw;
        $tag->display_name=$request->display_name;
        $tag->desc=$request->desc;
        $tag->save();

        $tag= Tag::find($tag->id);
        return view('tags.show')->with('tag', $tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return view('tags.index')->with('tags',Tag::all());
    }
}
