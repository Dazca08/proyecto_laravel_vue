<?php

namespace App\Models\Riesgos\Ajustes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClasesControles extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'clases_controles';
    protected $primaryKey= 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre' , 
    'descripcion',
    'estado',
    'estado_riesgos_corrupcion'


    ];
    public $timestamps = true;
}
