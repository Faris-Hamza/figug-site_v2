<?php

namespace App\Http\Controllers;


use App\Models\Depense;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class DepenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function pdfDepense($local)
    {
        $Depenses  = DB::select('select * from depenses');
        $lang = $local;
        $pdf = PDF::loadView('depenses.pdfDepense', compact('Depenses','lang'),['orientation'=> 'L','format'=> 'A4',]);
        return $pdf->stream('rapport.pdf');
    }

    public function index()
    {
        $Depenses = Depense::latest()->paginate(10);
        return view('depenses.index')->with('depenses',$Depenses);
    }

    public function create()
    {
        $ModePayement['Cheque'] = [
            'fr'=>'Chéque',
            'ar'=>'شيك',
        ];

        $ModePayement['Vb'] = [
            'fr'=>'Virement banquaire',
            'ar'=>'حوالة بنكية',
        ];
        $ModePayement['Espice'] = [
            'fr'=>'Espice',
            'ar'=>'أوراق نقدية',
        ];
        return view('depenses.create',compact('ModePayement'));
    }


    public function store(Request $request)
    {
        $ModePayement['Cheque'] = [
            'fr'=>'Chéque',
            'ar'=>'شيك',
        ];

        $ModePayement['Vb'] = [
            'fr'=>'Virement banquaire',
            'ar'=>'حوالة بنكية',
        ];
        $ModePayement['Espice'] = [
            'fr'=>'Espice',
            'ar'=>'أوراق نقدية',
        ];

        $this->validate($request, [
            'libelle'      =>'required',
            'date'         =>'required',
            'objectif'    =>'required',
            'Beneficiaire' =>'required',
            'montant'      =>'required',
            'modePayment'  =>'required',
            'justif'       =>'required|max:5000',
        ]);
        $newFile = time().$request->justif->getClientOriginalName();
        $request->justif->move('uploads/Depenses',$newFile);



        $Depense = Depense::create([
            'libelle'      => $request->libelle,
            'date'         => $request->date,
            'objectif'    => $request->objectif,
            'Beneficiaire' => $request->Beneficiaire,
            'montant'      => $request->montant,
            'modePayment'  => $ModePayement[$request->modePayment],
            'justif'       => 'uploads/Depenses/'.$newFile
        ]);

        return redirect()->back();
    }

    public function edit( $id)
    {
        $ModePayement['Cheque'] = [
            'fr'=>'Chéque',
            'ar'=>'شيك',
        ];

        $ModePayement['Vb'] = [
            'fr'=>'Virement banquaire',
            'ar'=>'حوالة بنكية',
        ];
        $ModePayement['Espice'] = [
            'fr'=>'Espice',
            'ar'=>'أوراق نقدية',
        ];
        $Depense = Depense::where('id', $id)->first();
        return view('depenses.edit')->with('depense',$Depense)->with('ModePayement',$ModePayement);
    }


    public function update(Request $request,  $id)
    {
        $ModePayement['Cheque'] = [
            'fr'=>'Chéque',
            'ar'=>'شيك',
        ];

        $ModePayement['Vb'] = [
            'fr'=>'Virement banquaire',
            'ar'=>'حوالة بنكية',
        ];
        $ModePayement['Espice'] = [
            'fr'=>'Espice',
            'ar'=>'أوراق نقدية',
        ];

        $Depense = Depense::where('id', $id)->first();
        $this->validate($request, [
            'libelle'      =>'required',
            'objectif'    =>'required',
            'date'         =>'required',
            'Beneficiaire' =>'required',
            'montant'      =>'required',
            'modePayment'  =>'required',
            'justif'       =>'max:5000'
        ]);

        if ($request->has('justif')) {
            if (File::exists(public_path($Depense->justif)))
            {
                File::delete(public_path($Depense->justif));
            }
            $newFile = time().$request->justif->getClientOriginalName();
            $request->justif->move('uploads/Depenses',$newFile);
            $Depense->justif = 'uploads/Depenses/'.$newFile;
        }

        $Depense->libelle       = $request-> libelle;
        $Depense->objectif     = $request->objectif;
        $Depense->date          = $request->date;
        $Depense->Beneficiaire  = $request->Beneficiaire;
        $Depense->montant       = $request->montant;
        $Depense->modePayment   = $ModePayement[$request->modePayment];
        $Depense->save();

        return redirect()->back();
    }


    public function destroy($id)
    {
        $Depense = Depense::where('id', $id)->first();
        if (File::exists(public_path($Depense->justif)))
        {
            File::delete(public_path($Depense->justif));
        }
        $Depense->forceDelete();
        return redirect()->back();
    }
}
