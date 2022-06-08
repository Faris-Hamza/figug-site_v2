<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Revenu extends Model
{
    use HasTranslations;
    protected $fillable = [ 'libelle', 'date', 'montant', 'source'];

    public $translatable = [ 'libelle','source'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
