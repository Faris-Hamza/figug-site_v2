<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Activite extends Model
{
    use HasTranslations;
    protected $fillable = [
        'id_Axe',
        'id_proj',
        'name'      ,
        'detail'    ,
        'lieu'      ,
        'date_debut',
        'date_fin'
    ];
    public $translatable = ['name', 'detail', 'lieu'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function projet(): BelongsTo
    {
        return $this->belongsTo(Projets::class,'id_proj', 'id');
    }
    public function Axes(): BelongsTo
    {
        return $this->belongsTo(Axes::class,'id_Axe');
    }

    public function Media(): HasMany
    {
        return $this->hasMany(Media::class,'id_activite');
    }

    public function rapports(): HasMany
    {
        return $this->hasMany(activite::class,'id_act');
    }

 }
