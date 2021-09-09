<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametrosDetalle extends Model
{
    use HasFactory;
    protected $table = 'parametros_detalles';
    protected $primaryKey= 'id';
    protected $fillable = [
    'parametro_id' , 
    'descripcion',
    'valor',
    'estado'


    ];
    public $timestamps = true;
}
