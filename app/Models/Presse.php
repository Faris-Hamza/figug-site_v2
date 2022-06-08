<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Presse extends Model
{
    use HasTranslations;
    protected $fillable = ['name','logo','url', 'lieu', 'date'];

    public $translatable = [
        'name','lieu',
    ];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
