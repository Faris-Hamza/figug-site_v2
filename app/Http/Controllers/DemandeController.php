<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDF;
use Illuminate\Support\Facades\DB;
class DemandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }

    public function pdfDemande($local,$id)
    {
        $Demande  = DB::select('select * from demandes where id = ? ',[$id]);
       // $Demande = $Demande[0];
        $lang = $local;
        $pdf = PDF::loadView('demandes.pdfDemande', compact('Demande','lang'))->setPaper('A4', 'landscape');
        return $pdf->download('Demande.pdf');
    }

    public function index()
    {
       $demandes = Demande::latest()->paginate(10);
       $affected = DB::update('update demandes set Veu = 1');
       return view('demandes.index')->with('demandes', $demandes);
    }

    public function create()
    {
        $GenreArray['Achat'] = [
            'fr'=>"Achat médicaments",
            'ar'=>'شراء الأدوية',
        ];
        $GenreArray['Intervention'] = [
            'fr'=>"Intervention chirugicale",
            'ar'=>'تدخل جراحي',
        ];
        $GenreArray['Frais'] = [
            'fr'=>"Frais de transport",
            'ar'=>'تكاليف النقل',
        ];
        $GenreArray['Articles'] = [
            'fr'=>"Articles de parapharmacie",
            'ar'=>'مواد الصيدلة',
        ];
        $GenreArray['Analyses'] = [
            'fr'=>"Analyses",
            'ar'=>'التحليلات',
        ];
        $GenreArray['Autres'] = [
            'fr'=>"Autres",
            'ar'=>'أخرى',
        ];
        return view('demandes.create',compact('GenreArray'));
    }

    public function store(Request $request)
    {
        $GenreArray['Achat'] = [
            'fr'=>"Achat médicaments",
            'ar'=>'شراء الأدوية',
        ];
        $GenreArray['Intervention'] = [
            'fr'=>"Intervention chirugicale",
            'ar'=>'تدخل جراحي',
        ];
        $GenreArray['Frais'] = [
            'fr'=>"Frais de transport",
            'ar'=>'تكاليف النقل',
        ];
        $GenreArray['Articles'] = [
            'fr'=>"Articles de parapharmacie",
            'ar'=>'مواد الصيدلة',
        ];
        $GenreArray['Analyses'] = [
            'fr'=>"Analyses",
            'ar'=>'التحليلات',
        ];
        $GenreArray['Autres'] = [
            'fr'=>"Autres",
            'ar'=>'أخرى',
        ];
       $this->validate($request, [
        'nom'          =>'required',
        'prenom'       =>'required',
        'cin'          =>'required',
        'email'        =>'required',
        'Tel'          =>'required',
        'adresse'      =>'required',
        'nbrRamed'     =>'required',
        'genreDemande' =>'required',
        'montant'      =>'required',
        'pieceJustifs' =>'required|max:5000',
       ]);

        if ($request->has('pieceJustifs')) {
            $piece = time().$request->pieceJustifs->getClientOriginalName();
            $request->pieceJustifs->move('uploads/Justifs',$piece);
        }

        $demande = Demande::create([
            'nom'          =>$request->nom,
            'prenom'       =>$request->prenom,
            'cin'          =>$request->cin,
            'email'        =>$request->email,
            'Tel'          =>$request->Tel,
            'adresse'      =>$request->adresse,
            'nbrRamed'     =>$request->nbrRamed,
            'genreDemande' =>$GenreArray[$request->genreDemande],
            'montant'      =>$request->montant,
            'pieceJustifs' =>'uploads/Justifs/'.$piece,
        ]);
        return redirect()->back()->with('success', 'Votre demande a bien été enregistrée');
    }

    public function show($id)
    {

    }

    public function edit( $id)
    {$GenreArray['Achat'] = [
        'fr'=>"Achat médicaments",
        'ar'=>'شراء الأدوية',
    ];
        $GenreArray['Intervention'] = [
            'fr'=>"Intervention chirugicale",
            'ar'=>'تدخل جراحي',
        ];
        $GenreArray['Frais'] = [
            'fr'=>"Frais de transport",
            'ar'=>'تكاليف النقل',
        ];
        $GenreArray['Articles'] = [
            'fr'=>"Articles de parapharmacie",
            'ar'=>'مواد الصيدلة',
        ];
        $GenreArray['Analyses'] = [
            'fr'=>"Analyses",
            'ar'=>'التحليلات',
        ];
        $GenreArray['Autres'] = [
            'fr'=>"Autres",
            'ar'=>'أخرى',
        ];
        $demande = Demande::where('id',$id)->first();
        return view('demandes.edit')->with('demande',$demande)->with('GenreArray',$GenreArray);;
    }

    public function update(Request $request, $id)
    {
        $GenreArray['Achat'] = [
            'fr'=>"Achat médicaments",
            'ar'=>'شراء الأدوية',
        ];
        $GenreArray['Intervention'] = [
            'fr'=>"Intervention chirugicale",
            'ar'=>'تدخل جراحي',
        ];
        $GenreArray['Frais'] = [
            'fr'=>"Frais de transport",
            'ar'=>'تكاليف النقل',
        ];
        $GenreArray['Articles'] = [
            'fr'=>"Articles de parapharmacie",
            'ar'=>'مواد الصيدلة',
        ];
        $GenreArray['Analyses'] = [
            'fr'=>"Analyses",
            'ar'=>'التحليلات',
        ];
        $GenreArray['Autres'] = [
            'fr'=>"Autres",
            'ar'=>'أخرى',
        ];
        $demande = Demande::where('id', $id)->first();
        $this->validate($request, [
            'nom'          =>'required',
            'prenom'       =>'required',
            'cin'          =>'required',
            'email'        =>'required',
            'Tel'          =>'required',
            'adresse'      =>'required',
            'nbrRamed'     =>'required',
            'genreDemande' =>'required',
            'montant'      =>'required',
            'pieceJustifs' =>'max:5000',
        ]);

        if ($request->has('pieceJustifs')) {
            if (File::exists(public_path($demande->pieceJustifs)))
            {
                File::delete(public_path($demande->pieceJustifs));
            }
            $file = $request->pieceJustifs;
            $newfile = time().$file->getClientOriginalName();
            $file->move('uploads/Justifs',$newfile);
            $demande->pieceJustifs='uploads/Justifs/'.$newfile;
        }

        $demande->nom          = $request->nom;
        $demande->prenom       =  $request->prenom;
        $demande->cin          = $request->cin;
        $demande->email        = $request->email;
        $demande->Tel          = $request->Tel;
        $demande->adresse      = $request->adresse;
        $demande->nbrRamed     = $request->nbrRamed;
        $demande->genreDemande = $GenreArray[$request->genreDemande];
        $demande->montant      = $request->montant;
        $demande->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $demande = Demande::where('id', $id)->first();
        if (File::exists(public_path($demande->pieceJustifs)))
            {
                File::delete(public_path($demande->pieceJustifs));
            }
        $demande->forceDelete();
        return redirect()->back();
    }
}
