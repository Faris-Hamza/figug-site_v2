<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Axes extends Model
{
    use HasTranslations;
    protected $fillable = ['nom', 'icon'];

    public $translatable =['nom'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function Activite()
    {
        return $this->hasMany(Activite::class,'id_Axe');
    }
}
