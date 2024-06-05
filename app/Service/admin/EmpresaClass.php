<?php

namespace App\Service\admin;

class EmpresaClass{
    private $DB;

    public function __construct(ConsultasDBClass $DB){
        $this->DB = $DB;
    }

    public function ingresarDatos($datos){

        $DListos = [];
        $DListos[0] = $datos->nombreEmpresa;
        $DListos[1] = $datos->razonSocial;
        $DListos[2] = $datos->rif;
        $DListos[3] = $datos->correo;
        $DListos[4] = $datos->telefono; 
        $DListos[5] = $datos->direccion;
        $DListos[6] = $datos->ciudad;
        $DListos[7] = $datos->estado;
        $DListos[8] = $datos->codigoPostal;
        $DListos[9] = $datos->google;
        $DListos[10] = $datos->facebook;
        $DListos[11] = $datos->instagram;
        $DListos[12] = ''; 

        if ($datos->hasFile('foto')) {
            $fot = $this->DB->obtenerDatosEmpresa();
            if (!empty($fot->foto)) {
                if (file_exists(public_path($fot->foto))) {
                    unlink(public_path($fot->foto));
                  }
            }
            $filename = time().'.'.$datos->foto->extension();
            $datos->foto->move(public_path('empresa'), $filename);

            $DListos[12] = 'empresa/'.$filename;
        }
        $this->DB->registroDataEmpresa($DListos);
    }

    public function obtenerDatos(){
       $datos = $this->DB->obtenerDatosEmpresa();
        return $datos;
    }
}
