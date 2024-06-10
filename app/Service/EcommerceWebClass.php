<?php

namespace App\Service;

use App\Service\admin\ConsultasDBClass;

class EcommerceWebClass
{
    private $DB;

    public function __construct(ConsultasDBClass $DB){
        $this->DB = $DB;
    }

    public function categorias(){
        $categoria = $this->DB->obtenerDatosCategoriasPaginate();
        return $categoria;
    }

    public function productos($categoria){
        $datos = $this->DB->productosNombre($categoria);
        foreach ($datos as $item) {
            $item->fotoURL = asset($item->foto);
        }
        return $datos;
    }

    public function CategoriaMisma($categoria){
        $datos = $this->DB->categoriaMisma($categoria);
        foreach ($datos as $item) {
            $item->fotoURL = asset($item->foto);
        }
        return $datos;
    }

    public function productosUni($producto){
        $datos = $this->DB->productosCodigo($producto);
        $datos->fotoURL = asset($datos->foto);
        return $datos;
    }

    public function productosUltimos(){
        $datos = $this->DB->productosDatosUltimos();
        return $datos;
    }

    public function suscripcion($correo){
        $this->DB->suscripcionWeb($correo);
    }

    public function datosEmpresa(){
        $empresa = $this->DB->obtenerDatosEmpresa();
        return $empresa;
    }

    public function banners(){
        $fotos = $this->DB->bannerDatos();
        $fotos->primaria = asset($fotos->primaria);
        $fotos->secundaria = asset($fotos->secundaria);
        $fotos->quienesSomos = asset($fotos->quienesSomos);
        return $fotos;
    }

    public function quinesSomos(){
        $datos = $this->DB->quienesSomosInformacion();
        return $datos;
    }

    public function inicio(){
        $datos = $this->DB->inicioDatos();
        return $datos;
    }
}
