<?php

namespace App\Service\admin;

use App\Models\Producto;

class ProductoClass
{
    private $DB;

    public function __construct(ConsultasDBClass $DB){
        $this->DB = $DB;
    }

    public function guardarImg($datos){
        $extension = $datos->file('foto')->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $datos->file('foto')->move(public_path('empresa/productos/img'), $filename);

        $nombreActualizado = 'empresa/productos/img/'.$filename;
        return $nombreActualizado;
}

    public function crearProducto($datos, $foto){
        $this->DB->crearProducto($datos, $foto);
    }

    public function datosProductos(){
        $datos = $this->DB->productosDatos();
        return $datos;
    }

    public function editarProducto($datos, $id){
        $producto = $this->DB->productoId($id);
        if ($datos->hasFile('foto')) {
            $this->DB->eliminarFotoCarpt($producto->foto);
            $fotoNombre = $this->guardarImg($datos);
            $producto->foto = $fotoNombre;
        }
        $producto->nombre = $datos->input('nombre');
        $producto->codigo = $datos->input('codigo');  
        $producto->descripcion = $datos->input('descripcion');
        $producto->categoria = $datos->input('categoria');
        $producto->precio = $datos->input('precio');
        $producto->cantidad = $datos->input('cantidad');
        $producto->save();
    }

    public function productoId($dato){
        $datos = $this->DB->productoId($dato);
        return $datos;
    }

    public function datosCategorias(){
        $datos = $this->DB->obtenerDatosCategorias();
        return $datos;
    }

    public function eliminarRegistroProductos(Producto $datos){
        $datos->delete();
    }

    public function eliminarFotoCarpt($fotoNombre){
        $this->DB->eliminarFotoCarpt($fotoNombre);
    }
}
