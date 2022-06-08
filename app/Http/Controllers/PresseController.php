<?php

namespace App\Http\Controllers;

use App\Models\Presse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PresseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $presses = Presse::latest()->paginate(10);
        return view('presses.index')->with('presses',$presses);
    }


    public function create()
    {
        return view('presses.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required', 
            'lieu'=> 'required', 
            'date'=> 'required', 
            'url'=> 'required', 
            'logo'=>'required|max:2048',            
        ]);

        $logo = time().$request->logo->getClientOriginalName();
        $request->logo->move('uploads/presses',$logo);
        $logo = 'uploads/presses/'.$logo;

        $presse = Presse:: create($request->except(['logo'])+ ['logo'=>$logo]);
        return redirect()->back()->with('message','presse Added Successfully!');
    }

    
    public function show(Presse $presse)
    {
        //
    }

    
    public function edit($id)
    {
        $presse = Presse::where('id',$id)->first();
        return view('presses.edit')->with("presse",$presse);
    }

    
    public function update(Request $request,$id)
    {
        $presse = Presse::where('id', $id)->first();
        $this->validate($request, [
            'name'=> 'required', 
            'lieu'=> 'required', 
            'date'=> 'required', 
            'url'=> 'required', 
            'logo'=>'max:2048',
        ]);

        $logo= $presse->logo;
        if ($request->has('logo')) {
            if (File::exists(public_path($presse->logo)))
            {
                File::delete(public_path($presse->logo));
            }
            $logo = time().$request->logo->getClientOriginalName();
            $request->logo->move('uploads/presses',$logo);
            $logo='uploads/presses/'.$logo;
        }
        $presse->logo=$logo;
        $presse->name=$request->name;
        $presse->lieu=$request->lieu;
        $presse->date=$request->date;
        $presse->url=$request->url;
        $presse->save();

        return redirect()->back()->with('message','presse Updated Successfully!');

    }
    
    public function destroy($id)
    {
        $presse = Presse::where('id', $id)->first();
        if (File::exists(public_path($presse->logo)))
        {
            File::delete(public_path($presse->logo));
        }
        $presse->forceDelete();
        return redirect()->back()->with('message','presse deleted Successfully!');
    }
}
