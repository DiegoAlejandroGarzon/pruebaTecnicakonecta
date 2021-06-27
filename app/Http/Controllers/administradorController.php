<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class administradorController extends Controller
{
    public function registroVendedor(){
        return view ('administrador.registrarVendedor');
    }
    public function administrarVendedores(){
        return view ('administrador.administrarVendedores');
    }
    public function usuariosLista(){
        $usuarios = User::all();
        $concatenaTabla=collect([]);
        foreach($usuarios as $usuario){
            if($usuario->id != 1){
            $collectionTabla = collect([
                [
                    'id'=>$usuario->id,
                    'Nombre'=>$usuario->name,
                    'Email'=>$usuario->email,
                ]
                ]);
            $concatenaTabla = $collectionTabla->concat($concatenaTabla);
            }
        }
        return response()->json(['data'=>$concatenaTabla],200);
    }
    public function editarUsuario($usuario_id){
        $usuario = User::findOrFail($usuario_id);
        return $usuario;
    }
    public function actualizarUsuario(Request $request){
        
        $user = User::find($request->id);
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->save();
        return $user;
    }
    public function eliminarUsuario(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return "eliminado";
    }
    public function registrarUsuario(Request $request){
        if($request->contraseña != $request->ccontraseña){
            
            $data=[
                'error'=>'on',
                'mensaje'=>'Las contraseñas no son iguales',
            ];
            return $data;
        }
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->contraseña);
        $usuario->save();
        $usuario->assignRole('vendedor');
        $data=[
            'error'=>'off',
            'mensaje'=>'Guardar con Exito',
        ];
        return $data;
    }
}
