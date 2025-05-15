<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class CrudController extends Controller
{
    // metodo listar
    public function index(){
        $datos=DB::select("SELECT * FROM producto");
        return view("Welcome")->with("datos",$datos);
    }
    // metodo crear
    public function create(Request $request){
        try{
            $sql = DB::insert("INSERT INTO producto(id_producto,nombre,precio,cantidad) VALUES (?,?,?,?)",[
                $request ->txtcodigo,
                $request ->txtnombre,
                $request ->txtprecio,
                $request ->txtcantidad
            ]);
        }catch(\Throwable $th)    {
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("Correcto","Producto registrado correctamente");
        }else{
            return back()->with("Incorrecto","Error al registrar producto");
        }
    }
    // metodo actualizar
    public function update(Request $request){
        try{
            $sql = DB::update("UPDATE producto set nombre = ?, precio = ?,cantidad = ? WHERE id_producto = ?" , [
                $request->txtnombre,
                $request->txtprecio,
                $request->txtcantidad,
                $request->txtcodigo
            ]);
        }catch(\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("Correcto","Producto actualizado correctamente");
        }else{
            return back()->with("Icorrecto","Error al actulizar producto");
        }
    }
    public function delete($id){
        try{
            $sql = DB::delete("DELETE FROM producto WHERE id_producto= $id");
        }catch(\Throwable $th){
            $sql =0;
        }
        if ($sql == true){
            return back()->with("Correcto","Producto eliminado correctamente");
        }else{
            return back()->with("Incorrecto","Error al eliminar producto");
        }
    }
}
