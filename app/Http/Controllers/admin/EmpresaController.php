<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\EmpresaClass;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    private $EmpresaClass; 

    public function __construct(EmpresaClass $EmpresaClass){
        $this->EmpresaClass = $EmpresaClass;
    }

    public function index(){
        $datos = $this->EmpresaClass->obtenerDatos();
        return view('admin.empresa', compact('datos'));
    }

    public function datos(Request $datos){
        try {
            $this->EmpresaClass->ingresarDatos($datos);
            $respuesta = response()->json(['success' => true]);
        } catch (\Throwable $th) {
            $respuesta = response()->json(['error' => true]);
        }
        return $respuesta;
    }
        
}
