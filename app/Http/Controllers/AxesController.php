<?php

namespace App\Http\Controllers;


use App\Models\Axes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AxesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $axes = Axes::latest()->paginate(10);
        return view('axe.index')->with('axes', $axes);
    }

    public function create()
    {
        return view('axe.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'icon'      => 'required|max:2048'
        ]);

        $icon = $request->icon;
        $newPhoto = time().$icon->getClientOriginalName();
        $icon->move('uploads/axe',$newPhoto);

        $axes = Axes::create([
            'nom'  => $request->nom,
            'icon'  =>'uploads/axe/'.$newPhoto,
        ]);
        return redirect()->back();
    }


    public function show(Axes $axes)
    {
        //
    }

    public function edit($id)
    {
        $axes = Axes::where('id', $id)->first();
        return view('axe.edit')->with('axes',$axes);
    }


    public function update(Request $request,$id)
    {

        $axes = Axes::where('id', $id)->first();
        $this->validate($request, [
            'nom' => 'required',
            'icon'      => 'image|mimes:jpg,png,jpeg|max:2048|'
        ]);

        if ($request->has('icon')) {
            if (File::exists(public_path($axes->icon)))
            {
                File::delete(public_path($axes->icon));
            }
            $icon = $request->icon;
            $newPhoto = time().$icon->getClientOriginalName();
            $icon->move('uploads/axe',$newPhoto);
            $axes->icon='uploads/axe/'.$newPhoto;
        }

        $axes->nom  = $request->nom;
        $axes->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $axes = Axes::where('id', $id)->first();
        if (File::exists(public_path($axes->icon)))
        {
            File::delete(public_path($axes->icon));
        }
        $axes->forceDelete();
        return redirect()->back();
    }
}
