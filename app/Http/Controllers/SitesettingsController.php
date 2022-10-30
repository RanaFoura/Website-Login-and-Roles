<?php

namespace App\Http\Controllers;

use App\Models\Sitesettings;
use Illuminate\Http\Request;

class SitesettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siteinfo.index')->with('siteinfo',Sitesettings::first());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sitesettings  $sitesettings
     * @return \Illuminate\Http\Response
     */
    public function edit(Sitesettings $sitesettings)
    {
        $siteinfo= Sitesettings::first();
        return view('siteinfo.edit')->with('siteinfo', $siteinfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sitesettings  $sitesettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sitesettings $siteinfo)
    {
        
        $this->validate($request,[
            "site_name" => 'required',
            "phone_number" => 'required',
            "email" => 'required',
            "address" => 'required',
            "paypal" => 'required',
            "desc" => 'required',

        ]);
        $siteinfo = Sitesettings::first();

        $siteinfo->site_name = $request->input('site_name');
        $siteinfo->phone_number = $request->input('phone_number');
        $siteinfo->email = $request->input('email');
        $siteinfo->address = $request->input('address');
        $siteinfo->paypal = $request->input('paypal');
        $siteinfo->desc = $request->input('desc');
        $siteinfo->save();

                $siteinfo = Sitesettings::first();

        return redirect(route('siteinfo.index', $siteinfo));
    }

}
