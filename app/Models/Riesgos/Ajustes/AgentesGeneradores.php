<?php

namespace App\Models\Riesgos\Ajustes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentesGeneradores extends Model
{
	use SoftDeletes;
    use HasFactory;
    protected $table = 'agentes_generadores';
    protected $primaryKey= 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre' , 
    'descripcion',
    'tipo_id',
    'estado'


    ];
    public $timestamps = true;
    public function tipo()
	{
	   return $this->belongsTo('App\Models\ParametrosDetalle', 'tipo_id');
	}
    
}
