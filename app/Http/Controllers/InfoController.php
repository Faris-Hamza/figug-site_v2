<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
       $info = Info:: create();
    }

    public function edit()
    {   $info = info::first();
        if ($info == null) {
            Info::create();
        }
        return view('infos.edit')->with('info', $info);
    }

    public function update(Request $request,$id)
    {
        $info = Info::where('id',$id)->first();
        $this->validate($request, [
            'Apropo'         => 'required',
            'bienvenu'       =>'required',
            'whatsapp'       =>'required',
            'fb'             =>'required',
            'instagram'      =>'required',
            'youtube'        =>'required',
            'vision'         =>'required',
            'stratigie'      =>'required',
            'programmes'     =>'required',
            'Linkedin'       =>'required',
            'twitter'        =>'required',
            'email'          =>'required|email',
            'txtAdherent'    =>'required',
            'txtSetunez'     =>'required',
        ]);
        $info->Apropo = $request->Apropo;
        $info->bienvenu = $request->bienvenu;
        $info->whatsapp = $request->whatsapp;
        $info->fb = $request->fb;
        $info->youtube = $request->youtube;
        $info->instagram = $request->instagram;
        $info->vision = $request->vision;
        $info->email = $request->email;
        $info->stratigie = $request->stratigie;
        $info->programmes = $request->programmes;
        $info->Linkedin = $request->Linkedin;
        $info->twitter = $request->twitter;
        $info->txtAdherent = $request->txtAdherent;
        $info->txtSetunez = $request->txtSetunez;;

        $info->save();
        return redirect()->back();
    }


}
