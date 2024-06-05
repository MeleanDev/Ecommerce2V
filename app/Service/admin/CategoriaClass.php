<?php

namespace App\Service\admin;

use App\Models\Categoria;

class CategoriaClass
{
    private $DB;

    public function __construct(ConsultasDBClass $DB){
        $this->DB = $DB;
    }

    public function guardarImg($datos){
            $filename = time().'.'.$datos->foto->extension();
            $datos->foto->move(public_path('empresa/categorias/img'), $filename);

            $nombreActualizado = 'empresa/categorias/img/'.$filename;
            return $nombreActualizado;
    }

    public function editarCategoria($datos, Categoria $id){

        if ($datos->hasFile('foto')) {
            $this->DB->eliminarFotoCarpt($id->foto);
            $fotoNombre = $this->guardarImg($datos);
            $id->foto = $fotoNombre;
        }
        $id->nombre = $datos->nombre;
        $id->descripcion = $datos->descripcion;
        $id->save();
}

    public function crearCategoria($datos, $foto){
        $this->DB->crearCategoria($datos, $foto);
    }

    public function datosCategoria(){
        $datos = $this->DB->obtenerDatosCategorias();
        return $datos; 
    }

    public function eliminarRegistroCategoria(Categoria $datos){
        $datos->delete();
    }

    public function eliminarFotoCarpt($fotoNombre){
        $this->DB->eliminarFotoCarpt($fotoNombre);
    }
    
}
