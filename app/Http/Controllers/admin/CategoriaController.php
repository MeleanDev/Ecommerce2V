<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoriaRequest;
use App\Models\Categoria;
use App\Service\admin\CategoriaClass;
use Illuminate\Http\Request;

class CategoriaController extends Controller{

    private $categoria;

    public function __construct(CategoriaClass $categoria){
        $this->categoria = $categoria;
    }

    public function index(){
        return view('admin.categoria');
    }

    public function lista(){
        $categorias = $this->categoria->datosCategoria();
        foreach ($categorias as $item) {
            $item->fotoUrl = asset($item->foto);
            $valor = $this->categoria->productosCategoria($item->nombre);
            $item->cantidad = $valor;
        }
        return datatables()->of($categorias)->toJson();
    }

    public function datoCategoria($id){
        $categoria = $this->categoria->categoriaId($id);
        $categoria->fotoUrl = asset($categoria->foto);
        return response()->json($categoria);
    }

    public function crear(CategoriaRequest $datos){
       try {
            $fotoNombre = $this->categoria->guardarImg($datos); 
            $this->categoria->crearCategoria($datos, $fotoNombre); 
            $respuesta = response()->json([
                'success' => true,
                'informacion' => 'Registro creado en el sistema',
                'accion' => 'creado'
            ]);
       } catch (\Throwable $th) {
            $this->categoria->eliminarFotoCarpt($fotoNombre);
            $respuesta = response()->json(['error' => true]);
       }
       return $respuesta;
    }

    public function editar(Request $datos ,$id){
        try {
            $this->categoria->editarCategoria($datos, $id);
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

    public function eliminar(Categoria $id){
        try {
            $fotoNombre = $id->foto;
            $this->categoria->eliminarFotoCarpt($fotoNombre); 
            $this->categoria->eliminarRegistroCategoria($id);
            $respuesta = response()->json(['success' => true,]);
       } catch (\Throwable $th) {
            $respuesta = response()->json(['error' => true]);
       }
       return $respuesta;
    }

}
