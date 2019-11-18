<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    /**
     * Atributos de asignación en masa
     *
     * @var array
     */
    protected $fillable = [
        'usuario', 'mes', 'monto', 'mora', 'estado',
    ];
}
