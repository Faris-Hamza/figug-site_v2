<?php

namespace App\Http\Controllers;

use App\Models\Projets;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Partenaire;
use App\Models\Projet_partenaires;
use Illuminate\Support\Facades\File;
use Redirect;

class ProjetsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projet = Projets::latest()->paginate(10);
        return view('projets.index')->with('projets', $projet);
    }

    public function create()
    {
        $partenairs = Partenaire::all();
        return view('projets.create')->with("partenairs",$partenairs);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'titre'       => 'required|max:50',
            'detail'     => 'required|max:1000',
            'responsable' => 'required|max:30',
            'lieu'        => 'required|max:30',
            'date_debut'  => 'required',
            'date_fin'    => 'required',
            'photo.*'     => 'required|max:2048'
        ]);

        if ((!$request->has('photo')) || (count($request->photo)>5 || count($request->photo)<=2)) {
            return Redirect::back()->withErrors(['msg' => 'Le nombre de photos autorisé est entre 3 et 5']);
        }

        $projet = Projets::create([
            'detail'      =>$request->detail,
            'titre'        =>$request->titre,
            'responsable'  =>$request->responsable,
            'lieu'         =>$request->lieu,
            'date_debut'   =>$request->date_debut,
            'date_fin'     =>$request->date_fin
        ]);

        $projet = Projets::latest()->first();

        foreach ($request->video as $item) {
            if (trim($item,"\0") != "")
            {
              $video=Media::create([
                'id_proj'=>$projet->id,
                'id_activite'=>0,
                'URL'=>$item,
                'types'=>"video"
              ]);
            }
        }
        if ($request->has('Partenaire')){
            foreach ($request->Partenaire as $item) {
                $partenairs=Projet_partenaires::create([
                    'id_proj'=>$projet->id,
                    'id_part'=>$item
                ]);
            }
        }
        foreach ($request->photo as $item) {
            $photo=$item;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/projet',$newPhoto);
            $photo=Media::create([
                'id_proj'=>$projet->id,
                'id_activite'=>0,
                'URL'=>'uploads/projet/'.$newPhoto,
                'types'=>"photo"
            ]);
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $projet = Projets::where('id', $id)->first();
        return view('projets.show')->with('projet', $projet);
    }

    public function edit($id)
    {
        $projet = Projets::where('id', $id)->first();
        $Partenar = Projet_partenaires::all()->where('id_proj',$id);
        $Partenair = Partenaire::all();
        return view('projets.edit')->with('projet',$projet)->with('Partenar',$Partenar)->with('Partenair',$Partenair);
    }

    public function update(Request $request,$id)
    {
        if ($request->has('photo') && (count($request->photo)>5 || count($request->photo)<=2)) {
            return Redirect::back()->withErrors(['msg' => 'Le nombre maximum de photos autorisé est de 5']);
        }
        $projet = Projets::where('id', $id)->first();
        $this->validate($request, [
            'titre'       => 'required',
            'detail'      => 'required',
            'responsable' => 'required',
            'lieu'        => 'required',
            'date_debut'  => 'required',
            'date_fin'    => 'required',
            'photo.*'     => 'max:2048'
        ]);

        if ($request->has('photo')) {
            foreach ($projet->Media as $item) {
                if (File::exists(public_path($item->URL))) {
                    File::delete(public_path($item->URL));
                }
                $item->forceDelete();
            }
            foreach ($request->photo as $item) {
                $newPhoto = time().$item->getClientOriginalName();
                $item->move('uploads/projet',$newPhoto);
                $item->URL = 'uploads/projet/'.$newPhoto;
                $item=Media::create([
                    'id_proj'=>$projet->id,
                    'id_activite'=>0,
                    'URL'=>'uploads/projet/'.$newPhoto,
                    'types'=>"photo"
                ]);
            }
        }

        if ($request->has('video')) {
            foreach ($projet->Media as $item) {
                $item->forceDelete();
            }
            foreach ($request->video as $item) {
                if (trim($item,"\0") != "") {
                    $video = Media::create([
                        'id_proj' => $projet->id,
                        'id_activite' => 0,
                        'URL' => $item,
                        'types' => "video"
                    ]);
                }
            }
        }
        if ($request->has('Partenaire')){
            foreach ($projet->Partenaire as $item) {
                $item->forceDelete();
            }
            foreach ($request->Partenaire as $item) {
                $partenairs=Projet_partenaires::create([
                    'id_proj'=>$projet->id,
                    'id_part'=>$item
                ]);
            }
        }
        $projet->detail     = $request->detail;
        $projet->titre        = $request->titre;
        $projet->responsable  = $request->responsable;
        $projet->lieu         = $request->lieu;
        $projet->date_debut   = $request->date_debut;
        $projet->date_fin     = $request->date_fin;
        $projet->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        $projet = Projets::where('id', $id)->first();
        foreach ($projet->Media as $item) {
            if (File::exists(public_path($item->URL)) && $item->types =="photo") {
                File::delete(public_path($item->URL));
            }
            $item->forceDelete();
        }
        $projet->forceDelete();
        return redirect()->back();
    }
}
