<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Depense extends Model
{
    use HasTranslations;
    protected $fillable =[
        'libelle',
        'date',
        'objectif',
        'Beneficiaire',
        'montant',
        'modePayment',
        'justif',
    ];

    public $translatable = ['libelle', 'objectif','Beneficiaire', 'modePayment'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
