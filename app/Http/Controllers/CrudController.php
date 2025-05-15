<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class CrudController extends Controller
{
    public function index(){
        $datos=DB::select("SELECT * FROM producto");
        return view("Welcome")->with("datos",$datos);
    }
    public function create(Request $request){
        try{  
            $sql = DB::insert('INSERT INTO producto(id_producto,nombre,precio,cantidad) VALUES (?,?,?,?)',[
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
}
