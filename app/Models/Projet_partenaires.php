<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet_partenaires extends Model
{
    protected $fillable= ['id_proj', 'id_part'];
}
