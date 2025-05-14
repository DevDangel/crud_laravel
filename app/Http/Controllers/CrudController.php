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
}
