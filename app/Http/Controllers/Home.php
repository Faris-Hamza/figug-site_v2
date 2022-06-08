<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Axes;
use Illuminate\Support\Facades\Auth;
use App\Models\Activite;
use App\Models\Projets;
//use App\Models\Adherent;
use App\Models\Presse;
use App\Models\Partenaire;
use App\Models\Mails;
use App\Models\Media;
use App\Models\Equipes;
use App\Models\User;
use App\Models\Info;
class Home extends Controller
{
    public function index()
    {
        $user = User::latest()->first();
        if ($user==null) {
             User::create([
                'name' => ['fr'=>"Admin",'ar'=>'مسؤول'],
                'email' => "Admin@gmail.com",
                'password' => Hash::make("Admin"),
            ]);
            Auth::logout();
        }
        $Info = Info::latest()->first();
        if ($Info==null) {
            $info['Apropo'] = [
                'fr'=>'Lorim upson en français',
                'ar'=>'العربية',
            ];

            $info['bienvenu'] = [
                'fr'=>'Lorim upson en français',
                'ar'=>'العربية',
            ];
            $info['Apropo'] = [
                'fr'=>'Lorim upson en français',
                'ar'=>'العربية',
            ];
            $info['vision'] = [
                'fr'=>'Lorim upson en français',
                'ar'=>'العربية',
            ];
            $info['whatsapp'] =  'Lorim upson en français';
            $info['instagram'] =  'Lorim upson en français';
            $info['fb'] =   'Lorim upson en français';
            $info['youtube'] =  'Lorim upson en français';
            $info['email'] = 'Lorim upson en français';
            $info['Linkedin'] = 'Lorim upson en français';
            $info['twitter'] = 'Lorim upson en français' ;
            $info['stratigie'] = [
                'fr'=>'Lorim upson en français',
                'ar'=>'العربية',
            ];
            $info['txtAdherent'] = [
                'fr'=>'Lorim upson en français',
                'ar'=>'العربية',
            ];
            $info['txtSetunez'] = [
                'fr'=>'Lorim upson en français',
                'ar'=>'العربية',
            ];
            $info['programmes'] = [
                'fr'=>'Lorim upson en français',
                'ar'=>'العربية',
            ];
            $Info = info::create($info);
        }
        $Acts = Activite::paginate(3);
        $Axes = Axes::all();
        $Presse = Presse::all();
        $Projet = Projets::all();
        $partenaire= Partenaire::all();
        return view('frontEnd.home')->with('info',$Info)->with('Acts',$Acts)->with('Projet',$Projet)->with('Part',$partenaire)->with("Presse",$Presse)->with('Axes',$Axes);
    }

    public function about()
    {
        $Info = Info::latest()->first();
        $Equipe = Equipes::all();
        return view('frontEnd.about')->with('info',$Info)->with('Equipe',$Equipe);
    }

    public function soutenezNous()
    {
        $Info = Info::latest()->first();
        return view('frontEnd.Soutenez-nous')->with('info',$Info);
    }

    public function activites()
    {
        $Acts = Activite::latest()->paginate(3);
        $Axes = Axes::paginate(9);
        return view('frontEnd.Activites')->with('Activites',$Acts)->with('Axes',$Axes);
    }

    public function projets()
    {
        $projets = Projets::latest()->paginate(3);
        $Axes = Axes::paginate(5);
        return view('frontEnd.Project')->with('projets',$projets)->with('Axes',$Axes);
    }


    public function showActivite($id)
    {
        $Acts = Activite::where('id',$id)->first();
        $Photos = $Acts->Media->where('types','photo');
        $Videos = $Acts->Media->where('types','video');
        return view('frontEnd.Titre_Activite')->with('Activite',$Acts)->with('Photos', $Photos)->with('Videos', $Videos);
    }


    public function showProjet($id)
    {
        $Projet = Projets::where('id',$id)->first();
        $Photos = $Projet->Media->where('types','photo');
        $Videos = $Projet->Media->where('types','video');
        return view('frontEnd.Activités_projet')->with('Projets',$Projet)->with('Photos', $Photos)->with('Videos', $Videos);
    }

    public function getInsc()
    {
        $Info = info::latest()->first();
        return view('frontEnd.Inscription')->with('info',$Info);
    }
}
