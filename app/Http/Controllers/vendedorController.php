<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class vendedorController extends Controller
{
    public function registrarCliente(){
        return view ('vendedor.registrarCliente');
    }
    public function administrarClientes(){
        return view ('vendedor.administrarClientes');
    }
    
    public function clientesLista(){
        $usuarios = clientes::all();
        $concatenaTabla=collect([]);
        $contador=1;
        foreach($usuarios as $usuario){
            if($usuario->name != 'Administrador'){
            $collectionTabla = collect([
                    [
                        'id'=>$usuario->id,
                        'nombre'=>$usuario->nombre,
                        'documento'=>$usuario->documento,
                        'email'=>$usuario->correo,
                        'direccion'=>$usuario->direccion,
                    ]
                ]);
            $concatenaTabla = $collectionTabla->concat($concatenaTabla);
            $contador++;
            }
        }
        return response()->json(['data'=>$concatenaTabla],200);
    }
    public function editarCliente($usuario_id){
        $usuario = clientes::findOrFail($usuario_id);
        return $usuario;
    }
    public function actualizarCliente(Request $request){
        $user = clientes::find($request->id);
        $user->nombre = $request->nombre;
        $user->correo = $request->email;
        $user->documento = $request->documento;
        $user->direccion = $request->direccion;
        $user->save();
        return $user;
    }
    public function eliminarCliente(Request $request){
        $user = clientes::find($request->id);
        $user->delete();
        return "eliminado";
    }
    public function registrarClientee(Request $request){
        $cliente = new clientes();
        $cliente->nombre = $request->name;
        $cliente->documento = $request->documento;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->save();
        $data=[
            'error'=>'off',
            'mensaje'=>'Guardar con Exito',
        ];
        return $data;
    }
}
