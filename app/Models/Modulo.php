<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    // Funcion para retornar los datos de los modulos
    function obtenerModulos()
    {
        $xml = simplexml_load_file(storage_path('app/datos/modulos.xml'));
        $modulos = $xml->xpath("//modulo");
        $resultado = [];

        foreach($modulos as $modulo => $valor)
        {
            $resultado[$modulo] = $valor;
        }

        return json_encode($resultado);
    }
}
