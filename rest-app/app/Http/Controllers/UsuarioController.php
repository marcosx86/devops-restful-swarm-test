<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;

use DB;

class UsuarioController extends Controller
{
    public function lista()
    {
        //$usuarios = Usuario::query()->get();
        //return response()->json($usuarios);
        
        return DB::table('usuarios')->get();
    }
    
    public function novo(Request $request)
    {
    	$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true);
 
    	return DB::table('usuarios')->insertGetId($data);
    }
 
    public function editar($id, Request $request)
    {
        $data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true);

        $res = DB::table('usuarios')
                ->where('id',$id)
                ->update($data);

        return ["status" => ($res) ? 'ok' : 'erro'];
    }
}
