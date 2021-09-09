<?php

namespace App\Models\Administracion\Datos_Basicos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadesMedidas extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unidades_medidas';

    protected $fillable = [
        'nombre',
        'simbolo'
    ];
}
