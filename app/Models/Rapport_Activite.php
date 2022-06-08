<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Rapport_Activite extends Model
{
    use HasTranslations;
    protected $fillable =[
        'id_act',
        'context',
        'lieu',
        'date',
        'nbr_femme',
        'nbr_homme',
        'reference'
    ];

    public $translatable = [ 'context','lieu' ];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function activite()
    {
        return $this->belongsTo(Activite::class,'id_act');
    }
}
