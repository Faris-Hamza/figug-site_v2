<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Rapport_Activite;
use App\Models\Activite;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RapportActiviteController extends Controller
{
    public function pdfRapport($id,$local)
    {
        $lang = $local;
        $Rapport = Rapport_Activite::where('id',$id)->first();
        $Photos = $Rapport->activite->Media->where('types','photo');
        $pdf = PDF::loadView('rapports/pdfRapport',compact('Rapport','Photos','lang'));
        return $pdf->stream("rapport".$Rapport->activite()->first()->name.'.pdf');
    }

    public function index()
    {
        $Rapports = Rapport_Activite::latest()->paginate(10);
        return view('rapports.index')->with('rapports',$Rapports);
    }

    public function create()
    {
        $Activites = Activite::all();
        return view('rapports.create')->with('activites',$Activites);
    }

    public function store(Request $request)
    {
       $this->validate($request, [
        'id_act'    => 'required',
        'context'    => 'required',
        'lieu'      => 'required',
        'date'     => 'required',
        'nbr_femme'=> 'required',
        'nbr_homme' => 'required',
        'reference' => 'required|max:5000'
       ]);
        $newFile = time().$request->reference->getClientOriginalName();
        $request->reference->move('uploads/Rapport_Activite',$newFile);
        $Rapport = Rapport_Activite::create([
            'id_act'    => $request->id_act,
            'context'   => $request->context,
            'lieu'      => $request->lieu,
            'date'      => $request->date,
            'nbr_femme' => $request->nbr_femme,
            'nbr_homme' => $request->nbr_homme,
            'reference' => 'uploads/Rapport_Activite/'.$newFile
        ]);
        return redirect()->back();
    }
    public function edit($id)
    {
        $Activites = Activite::all();
        $Rapport = Rapport_Activite::where('id', $id)->first();
        return view('rapports.edit')->with('rapport',$Rapport)->with('activites',$Activites);
    }
    public function update(Request $request, $id)
    {
        $Rapport = Rapport_Activite::where('id', $id)->first();
        $this->validate($request, [
            'id_act'    =>'required',
            'context'   =>'required',
            'lieu'      =>'required',
            'date'      =>'required',
            'nbr_femme' =>'required',
            'nbr_homme' =>'required',
            'reference' =>'max:5000',
        ]);
        if ($request->has('reference')) {
            if (File::exists(public_path($Rapport->reference)))
            {
                File::delete(public_path($Rapport->reference));
            }
            $newFile = time().$request->reference->getClientOriginalName();
            $request->reference->move('uploads/Rapport_Activite',$newFile);
            $Rapport->reference = 'uploads/Rapport_Activite/'.$newFile;
        }
        $Rapport->id_act      = $request->id_act;
        $Rapport->context     = $request->context;
        $Rapport->lieu        = $request->lieu;
        $Rapport->date        = $request->date;
        $Rapport->nbr_femme   = $request->nbr_femme;
        $Rapport->nbr_homme   = $request->nbr_homme;
        $Rapport->save();

        return redirect()->back();
    }
    public function destroy($id)
    {
        $Rapport = Rapport_Activite::where('id', $id)->first();
        if (File::exists(public_path($Rapport->reference)))
        {
            File::delete(public_path($Rapport->reference));
        }
        $Rapport->forceDelete();
        return redirect()->back();
    }
}
