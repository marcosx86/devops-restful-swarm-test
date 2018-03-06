<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;
use App\Http\Resources\Usuario as UsuarioResource;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::query()->get();
        return response()->json($usuarios);
    }
    
    public function show($id)
    {
        return new UsuarioResource(Usuario::find($id));
    }
}
