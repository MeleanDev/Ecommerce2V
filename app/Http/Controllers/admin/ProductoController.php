<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Service\admin\ProductoClass;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    private $producto;

    public function __construct(ProductoClass $producto){
        $this->producto = $producto;
    }

    public function index(){
        $categorias = $this->producto->datosCategorias();
        return view('admin.productos', compact('categorias'));
    }

    public function lista(){
        $productos = $this->producto->datosProductos();
        foreach ($productos as $item) {
            $item->fotoUrl = asset($item->foto);
        }
        return datatables()->of($productos)->toJson();
    }

    public function datoProducto($id){
        $producto = $this->producto->productoId($id);
        $producto->fotoUrl = asset($producto->foto);
        return response()->json($producto);
    }

    public function crear(Request $datos){
       try {
            $fotoNombre = $this->producto->guardarImg($datos); 
            $this->producto->crearProducto($datos, $fotoNombre); 
            $respuesta = response()->json([
                'success' => true,
                'informacion' => 'Registro creado en el sistema',
                'accion' => 'creado'
            ]);
       } catch (\Throwable $th) {
            $this->producto->eliminarFotoCarpt($fotoNombre);
            $respuesta = response()->json(['error' => true]);
       }
       return $respuesta;
    }

    public function editar(Request $datos ,$id){
        try {
            $this->producto->editarProducto($datos, $id);
            $respuesta = response()->json([
                'success' => true,
                'informacion' => 'Registro editado en el sistema',
                'accion' => 'editado'
            ]);
       } catch (\Throwable $th) {
            $respuesta = response()->json(['error' => true]);
       }
       return $respuesta;
    }

    public function eliminar(Producto $id){
        try {
            $fotoNombre = $id->foto;
            $this->producto->eliminarFotoCarpt($fotoNombre); 
            $this->producto->eliminarRegistroProductos($id);
            $respuesta = response()->json(['success' => true,]);
       } catch (\Throwable $th) {
            $respuesta = response()->json(['error' => true]);
       }
       return $respuesta;
    }

}
