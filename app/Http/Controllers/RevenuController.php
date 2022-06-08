<?php

namespace App\Http\Controllers;

use App\Models\Revenu;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class RevenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdfRevenu($local)
    {
       $Revenus  = DB::select('select * from revenus');
       $lang = $local;
         $pdf = PDF::loadView('revenus/pdfRevenu', compact('Revenus','lang'),['orientation'=> 'L','format'=> 'A4',]);
          return $pdf->download('revenus.pdf');
    }

    public function index()
    {
        $Revenus = Revenu::latest()->paginate(10);
        return view('revenus.index')->with('revenus', $Revenus);
    }


    public function create()
    {
        return view('revenus.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'libelle' =>'required',
            'date'    =>'required',
            'montant' =>'required',
            'source'  =>'required'
        ]);
        $Revenu = Revenu::create($request->all());
        return redirect()->back();
    }


    public function show(Revenu $revenu)
    {

    }

    public function edit( $id)
    {
        $Revenu = Revenu::where('id', $id)->first();
        return view('revenus.edit')->with('revenu', $Revenu);
    }


    public function update(Request $request, $id)
    {
        $Revenu = Revenu::where('id', $id)->first();
        $this->validate($request,[
            'libelle' =>'required',
            'date'    =>'required',
            'montant' =>'required',
            'source'  =>'required'
        ]);

        $Revenu->libelle = $request->libelle;
        $Revenu->date = $request->date;
        $Revenu->montant = $request->montant;
        $Revenu->source = $request->source;
        $Revenu->save();

        return redirect()->back();
    }


    public function destroy( $id)
    {
        $Revenu = Revenu::where('id', $id)->first();
        $Revenu->forceDelete();
        return redirect()->back();
    }
}
