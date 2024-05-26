<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\EmpresaRequest;
use App\Service\admin\EmpresaClass;

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

    public function datos(EmpresaRequest $datos){
        $this->EmpresaClass->ingresarDatos($datos);
        return redirect()->route('empresa');
    }
}
