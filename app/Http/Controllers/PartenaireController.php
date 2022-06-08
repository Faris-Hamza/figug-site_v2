<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartenaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $partenaire = Partenaire:: latest()->paginate(10);
        return view('partenaires.index')->with('partenaires', $partenaire);
    }

    public function create()
    {
        return view('partenaires.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'logo'  => 'required|image|mimes:jpg,png,jpeg|max:2048|',
            'name' =>'required',
            'url'  =>'required'
        ]);

        $logo = $request->logo;
        $newLogo = time().$logo->getClientOriginalName();
        $logo->move('uploads/partenaire',$newLogo);

        $partenaire = Partenaire::create([
            'logo' => 'uploads/partenaire/'.$newLogo,
            'name' => $request->name,
            'url'  => $request->url,
        ]);

        return redirect()->back();
    }

    public function show($id)
    {
        $partenaire = Partenaire::where('id', $id)->first();
        return view('partenaires.show')->with('partenaire',$partenaire);
    }

    public function edit($id)
    {
        $partenaire = Partenaire::where('id', $id)->first();
        return view('partenaires.edit')->with('partenaire',$partenaire);
    }

    public function update(Request $request,$id)
    {
        $partenaire = Partenaire::where('id', $id)->first();
        $this->validate($request,[
            'logo' => 'image|mimes:jpg,png,jpeg|max:2048|',
            'name' =>'required',
            'url'  =>'required'
        ]);


        if ($request->has('logo')) {
            if (File::exists(public_path($partenaire->logo)))
            {
                File::delete(public_path($partenaire->logo));
            }
            $logo = $request->logo;
            $newLogo = time().$logo->getClientOriginalName();
            $logo->move('uploads/partenaire',$newLogo);
            $partenaire->logo='uploads/partenaire/'.$newLogo;
            $partenaire->save();
        }

        $partenaire->name = $request->name;
        $partenaire->url = $request->url;
        $partenaire->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $partenaire = Partenaire::where('id', $id)->first();
        if (File::exists(public_path($partenaire->logo))) {
            File::delete(public_path($partenaire->logo));
        }
        $partenaire->forceDelete();
        return redirect()->back();
    }
}
