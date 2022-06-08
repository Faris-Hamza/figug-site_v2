<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Demande extends Model
{
    use HasTranslations;

    protected $fillable = ['nom', 'prenom', 'cin', 'email', 'Tel', 'adresse', 'nbrRamed', 'genreDemande', 'montant', 'pieceJustifs'];

    public $translatable = ['nom', 'prenom','genreDemande','adresse'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
