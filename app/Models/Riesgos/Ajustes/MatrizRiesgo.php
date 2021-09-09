<?php

namespace App\Models\Riesgos\Ajustes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatrizRiesgo extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'matrices_riesgo';
    protected $primaryKey= 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre' 

    ];
    public $timestamps = true;
}
