<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\admin\SuscritoWebClass;

class SuscritoWebController extends Controller
{
    private $suscritoWeb;

    public function __construct(SuscritoWebClass $suscritoWeb){
        $this->suscritoWeb = $suscritoWeb;
    }

    public function index(){
        return view('admin.suscritosWeb');
    }

    public function lista(){
        $datos = $this->suscritoWeb->lista();
        return datatables()->of($datos)->toJson();
    }

    public function eliminar(Request $datos){
        $seguro = $datos['seguro'];
        if ($seguro == 1) {
            $this->suscritoWeb->borrarTodo();
            $respuesta = response()->json(['success' => true]);
        }
        return $respuesta;
    }
}