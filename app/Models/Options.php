<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parametros_detalles';

    public function getParametroDetalles($parametro_id)
    {
        $resultado = options::select("descripcion as name", "valor as value");
        $resultado = $resultado->where([['parametro_id', '=', $parametro_id], ['estado', '=', 1]]);
        $resultado = $resultado->orderBy('valor','asc');
        $resultado = $resultado->get();
        return $resultado;
    }
}
