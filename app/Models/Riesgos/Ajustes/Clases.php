<?php

namespace App\Models\Riesgos\Ajustes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Clases extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'clases';
    protected $primaryKey= 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre' , 
    'descripcion',
    'matriz_id',
    'estado'

    ];
    public $timestamps = true;
    public function matriz()
	{
	   return $this->belongsTo('App\Models\Riesgos\Ajustes\MatrizRiesgo', 'matriz_id');
	}
}
