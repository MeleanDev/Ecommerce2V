<?php

namespace App\Service\admin;

class EmpresaClass{
    private $DB;

    public function __construct(ConsultasDBClass $DB){
        $this->DB = $DB;
    }

    public function ingresarDatos($datos){

        $DListos = [];
        $DListos[0] = $datos->input('nombreEmpresa');
        $DListos[1] = $datos->input('razonSocial');
        $DListos[2] = $datos->input('rif');
        $DListos[3] = $datos->input('correo');
        $DListos[4] = $datos->input('telefono');
        $DListos[5] = $datos->input('direccion');
        $DListos[6] = $datos->input('ciudad');
        $DListos[7] = $datos->input('estado');
        $DListos[8] = $datos->input('codigoPostal');
        $DListos[9] = $datos->input('google');
        $DListos[10] = $datos->input('facebook');
        $DListos[11] = $datos->input('instagram');
        $DListos[12] = ''; 

        if ($datos->hasFile('foto')) {
            $fot = $this->DB->obtenerDatosEmpresa();
            if (!empty($fot->foto)) {
                if (file_exists(public_path($fot->foto))) {
                    $this->DB->eliminarFotoCarpt($fot->foto);
                  }
            }

            $extension = $datos->file('foto')->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $datos->file('foto')->move(public_path('empresa'), $filename);

            $DListos[12] = 'empresa/'.$filename;
        }
        $this->DB->registroDataEmpresa($DListos);
    }

    public function obtenerDatos(){
       $datos = $this->DB->obtenerDatosEmpresa();
        return $datos;
    }
}
