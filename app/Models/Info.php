<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Info extends Model
{
    use HasTranslations;
    protected $fillable = [   'Apropo', 'bienvenu', 'vision', 'stratigie', 'programmes', 'whatsapp',
    'fb', 'instagram','email', 'youtube', 'Linkedin', 'twitter','txtAdherent', 'txtSetunez'];

    public $translatable = [
        'Apropo', 'bienvenu', 'vision', 'stratigie', 'programmes','txtAdherent', 'txtSetunez',
    ];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
