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
            $extension = $datos->file('foto')->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $datos->file('foto')->move(public_path('empresa/categorias/img'), $filename);

            $nombreActualizado = 'empresa/categorias/img/'.$filename;
            return $nombreActualizado;
    }

    public function editarCategoria($datos, $id){
        $categoria = $this->DB->categoriaId($id);
        if ($datos->hasFile('foto')) {
            $this->DB->eliminarFotoCarpt($categoria->foto);
            $fotoNombre = $this->guardarImg($datos);
            $categoria->foto = $fotoNombre;
        }
        $categoria->nombre = $datos->input('nombre');
        $categoria->descripcion = $datos->input('descripcion');
        $categoria->save();
    }

    public function categoriaId($dato){
        $datos = $this->DB->categoriaId($dato);
        return $datos;
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

    public function productosCategoria($nombre){
        $categoria = $this->DB->categoriaMismaCount($nombre);
        return $categoria;
    }
    
}
