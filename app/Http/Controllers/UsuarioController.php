<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    // Funcion para manejar la lógica del login
    public function login(Request $request)
    {
        $request->validate(
            [
                'usuario' => 'required',
                'clave' => 'required'
            ]
        );

        $alias = $request->usuario;
        $clave = $request->clave;

        $usuarios = new Usuario();
        $usuarios = json_decode($usuarios->obtenerUsuarios(), true);

        foreach($usuarios as $usuario)
        {
            if ($usuario["alias"] === $alias && $usuario["clave"] === $clave)
            {
                session_start();
                $_SESSION['alias'] = $usuario["alias"];
                $_SESSION['perfil'] = $usuario["perfil"];
                $_SESSION['permisos'] = $usuario["permisos"];
                return response()->json(["alias" => $usuario["alias"], "perfil" => $usuario["perfil"], "permisos" => $usuario["permisos"]]);
            }
        }
        return response()->json(["respuesta" => false]);
    }

    // Funcion para manejar la lógica del logout
    public function logout()
    {
        session_start();
        if (isset($_SESSION['alias']) && isset($_SESSION['perfil']) && isset($_SESSION['permisos']))
        {
            session_destroy();
            setcookie(session_name(), 123, time() - 1000);
            return response()->json(["respuesta" => true]);
        } else {
            return response()->json(["respuesta" => false]);
        }
    }
}
