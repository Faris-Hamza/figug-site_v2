<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;
use App\Models\Mails;
use App\Models\Demande;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{

    public function index()
    {
        //
    }
    public static function store()
    {
        $not = Notifications::all();
            if (count($not->where('Type','mail'))===0) {
                $mailnot = Notifications::create(['Type' => "mail"]);
            }
            if (count($not->where('Type','demand'))==0) {
                $demandnot = Notifications::create(['Type' => "demand"]);
            }
    }
    public static function create($type)
    {
         NotificationsController::store();
           $affected = DB::update('update notifications set C_ount = C_ount+1 where Type = "'.$type.'"');
    }

    public function show($type)
    {  
        $c_ount = DB::select('SELECT * from notifications where Type = "'.$type.'"');
        if ($type == "mail") {
            NotificationsController::store();
           $affected = DB::update('update mails set Veu = 1');
           return redirect()->route('mail');
        } else {
            $demand = DB::select('SELECT * FROM demandes ORDER BY created_at DESC LIMIT '.$c_ount[0]->C_ount.'');
            NotificationsController::store();
             $affected = DB::update('update notifications set C_ount = 0 where Type = "demand"');
             $affected = Demande::latest()->take($c_ount[0]->C_ount )->get();
             DB::update('UPDATE demandes set Veu =1 where id IN (SELECT id FROM demandes ORDER BY created_at DESC LIMIT '.$c_ount.')');
            // return redirect()->route('demandes',$);
        }
    }

    public function update(Request $request, Notifications $notifications)
    {
        //
    }

}
