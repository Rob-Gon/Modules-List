<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Funcion para retornar los datos de los usuarios
    function obtenerUsuarios()
    {
        $xml = simplexml_load_file(storage_path('app/datos/configuracion.xml'));
        $usuarios = $xml->xpath("//usuario");
        $resultado = [];

        foreach($usuarios as $usuario => $valor)
        {
            $resultado[$usuario] = $valor;
        }

        return json_encode($resultado);
    }
}
