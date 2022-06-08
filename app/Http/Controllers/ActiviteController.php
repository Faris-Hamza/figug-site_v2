<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Models\Projets;
use App\Models\Media;
use App\Models\Axes;
use Illuminate\Support\Facades\File;
// use File;
use Image;
use Redirect;

class ActiviteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $activite = Activite::latest()->paginate(10);
        return view('activites.index')->with('activite', $activite);
    }

    public function create()
    {
        $projets = Projets::all();
        $Axes = Axes::all();
        return view('activites.create')->with('projets', $projets)->with('Axes', $Axes);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'           => 'required|max:50',
            'detail'         => 'required|max:1000',
            'lieu'           => 'required|max:30',
            'date_debut'     => 'required',
            'date_fin'       => 'required',
            'photo.*'        => 'required|max:2048'
        ]);

        if (count($request->photo)>5 && count($request->photo)<=2 ) {
            return Redirect::back()->withErrors(['msg' => 'Le nombre maximum de photos autorisé est de 5']);
        }

        $activite = Activite::create([

            'name'        =>$request->name,
            'id_proj'     =>$request->id_proj,
            'detail'      =>$request->detail,
            'id_Axe'      =>$request->id_Axe,
            'lieu'        =>$request->lieu,
            'date_debut'  =>$request->date_debut,
            'date_fin'    =>$request->date_fin,

        ]);
        $activite = Activite::latest()->first();
        foreach ($request->video as $item) {
            if (trim($item,"\0") != "") {
                $video = Media::create([
                    'id_activite' => $activite->id,
                    'id_proj' => 0,
                    'URL' => $item,
                    'types' => "video"
                ]);
            }
        }

        foreach ($request->photo as $item) {
            // $image_name = ActiviteController::resize($item);
             $image_name = time().$item->getClientOriginalName();
             $item->move("uploads/activites",$image_name);
            $item=Media::create([
                'id_activite'=>$activite->id,
                'id_proj'=>0,
                'URL'=>'uploads/activites/'.$image_name,
                'types'=>'photo'
            ]);
        }
        return redirect()->back();
    }

    // public function resize($item){

    //          $image = Image::make($item);

    //         $image->resize( 300, 180);
    //         $image_path = url('public_html/uploads/activites/ /');

    //         if (!(File::exists($image_path))) {
    //             File::makeDirectory($image_path,0777,true);
    //         }

    //         $image_name = time().$item->getClientOriginalName();
    //         $item->move($image_path.$image_name);
    //         return $image_name;
    // }

    public function show($id)
    {
        $activite = Activite::where('id', $id)->first();
        return view('activites.show')->with('activite', $activite);
    }

    public function edit($id)
    {
        $projets = Projets::all();
        $activite = Activite::where('id', $id)->first();
        $Axes = Axes::all();
        return view('activites.edit')->with('activite',$activite)->with('Axes', $Axes)->with('projets', $projets);
    }


    public function update(Request $request,$id)
    {
        if ($request->has('photo') && (count($request->photo)>5 || count($request->photo)<=2)) {
            return Redirect::back()->withErrors(['msg' => 'Le nombre maximum de photos autorisé est de 5']);
        }
        $activite = Activite::where('id', $id)->first();
        $this->validate($request, [
            'name'           => 'required|max:50',
            'detail'         => 'required|max:1000',
            'lieu'           => 'required|max:30',
            'date_debut'     => 'required',
            'date_fin'       => 'required',
            'photo.*'        => 'max:2048'
        ]);

        if ($request->has('photo')) {
            foreach ($activite->Media as $item) {
                if (File::exists(public_path($item->URL))) {
                    File::delete(public_path($item->URL));
                }
                $item->forceDelete();
            }
            foreach ($request->photo as $item) {
                // $image_name = ActiviteController::resize($item);
                 $image_name = time().$item->getClientOriginalName();
                 $item->move("uploads/activites",$image_name);
                $item=Media::create([
                    'id_activite'=>$activite->id,
                    'id_proj'=>0,
                    'URL'=>'uploads/activites/'.$image_name,
                    'types'=>'photo'
                ]);

            }
        }

        if ($request->has('video')) {
            foreach ($activite->Media as $item) {
                $item->forceDelete();
            }
            foreach ($request->video as $item) {
              if (trim($item,"\0") != "")
              {
                  $video=Media::create([
                      'id_proj'=>0,
                      'id_activite'=>$activite->id,
                      'URL'=>$item,
                      'types'=>"video"
                  ]);
              }

            }
        }

        $activite->name         = $request->name;
        $activite->id_proj      = $request->id_proj;
        $activite->id_Axe      = $request->id_Axe;
        $activite->detail       = $request->detail;
        $activite->lieu         = $request->lieu;
        $activite->date_debut   = $request->date_debut;
        $activite->date_fin     = $request->date_fin;
        $activite->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $activite = Activite::where('id', $id)->first();
        foreach ($activite->Media as $item) {
            if (File::exists(public_path($item->URL))) {
                File::delete(public_path($item->URL));
            }
            $item->forceDelete();
        }
        $activite->forceDelete();
        return redirect()->back();
    }
}
