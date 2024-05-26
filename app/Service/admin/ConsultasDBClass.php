<?php

namespace App\service\admin;

use App\Models\Empresa;

class ConsultasDBClass{

// Empresa

    // Registramos los datos en la DB
    public function registroDataEmpresa($datos){
        $empresa = $this->obtenerDatosEmpresa();
        $empresa->nombreEmpresa = $datos[0];
        $empresa->razonSocial = $datos[1];
        $empresa->rif = $datos[2];
        $empresa->correo = $datos[3];
        $empresa->telefono = $datos[4];
        $empresa->direccion = $datos[5];
        $empresa->ciudad = $datos[6];
        $empresa->estado = $datos[7];
        $empresa->codigoPostal = $datos[8];
        $empresa->foto = $retVale = ($datos[9] === '') ? $empresa->foto : $datos[9];
        $empresa->save();
    }

    // Obetener los datos de la empresa
    public function obtenerDatosEmpresa(){
        $datos = Empresa::first();
        return $datos;
    }

}
