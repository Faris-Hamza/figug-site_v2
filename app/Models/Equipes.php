<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Equipes extends Model
{
    use HasTranslations;

    protected $fillable = ['nom', 'photo', 'statu'];

    public $translatable = ['nom','statu'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
