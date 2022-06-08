<?php

namespace App\Http\Controllers;

use App\Models\Equipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EquipesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $equipes = Equipes::latest()->paginate(10);
        return view('equipes.index')->with('equipes', $equipes);
    }


    public function create()
    {
        return view('equipes.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'statu'      => 'required',
            'photo'      => 'required|image|mimes:jpg,png,jpeg|max:2048|'
        ]);


        $newPhoto = time().$request->photo->getClientOriginalName();
        $request->photo->move('uploads/equipes',$newPhoto);

        $team = Equipes::create([
            'nom'  => $request->nom,
            'statu'  => $request->statu,
            'photo'  =>'uploads/equipes/'.$newPhoto,

        ]);
        return redirect()->back();
    }


    public function show(Equipes $equipes)
    {
        //
    }


    public function edit($id)
    {
        $equipes = Equipes::where('id', $id)->first();
        return view('equipes.edit')->with('equipes',$equipes);
    }


    public function update(Request $request,$id)
    {
        $equipes = Equipes::where('id', $id)->first();
        $this->validate($request, [
            'nom' => 'required',
            'statu'      => 'required',
            'photo'      => 'image|mimes:jpg,png,jpeg|max:2048|'
        ]);

        if ($request->has('photo')) {
            if (File::exists(public_path($equipes->photo)))
            {
                File::delete(public_path($equipes->photo));
            }
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/equipes',$newPhoto);
            $equipes->photo='uploads/equipes/'.$newPhoto;

        }

        $equipes->nom  = $request->nom;
        $equipes->statu  = $request->statu;
        $equipes->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $equipes = Equipes::where('id', $id)->first();
        if (File::exists(public_path($equipes->photo)))
        {
            File::delete(public_path($equipes->photo));
        }
        $equipes->forceDelete();
        return redirect()->back();
    }
}
