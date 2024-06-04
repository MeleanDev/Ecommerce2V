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
        $categorias = $this->categoria->datosCategoria();
        return view('admin.categoria', compact('categorias'));
    }

    public function crear(CategoriaRequest $datos){
       $fotoNombre = $this->categoria->guardarImg($datos); // se guarda la img en la carpeta y renombramos el nombre de la foto
       try {
            $this->categoria->crearCategoria($datos, $fotoNombre); // se guarda el registro de la categoria
            return redirect()->route('categoria')->with('correctamente','Creacion de categoria con exito');
       } catch (\Throwable $th) {
            $this->categoria->eliminarFotoCarpt($fotoNombre); // Se elimina la foto por si hay un fallo en la creacion
            return redirect()->route('categoria')->with('incorrectamente','Esta categoria ya existe no puede a ver 2 iguales');
       }
    }

    public function editar(Request $datos ,Categoria $id){
        $this->categoria->editarCategoria($datos, $id);
        return redirect()->route('categoria')->with('correctamente','La categoria se edito con exito'); 
    }

    public function eliminar(Categoria $id){
        $fotoNombre = $id->foto;
        $this->categoria->eliminarFotoCarpt($fotoNombre); 
        $this->categoria->eliminarRegistroCategoria($id);
        return redirect()->route('categoria')->with('correctamente','Categoria Eliminada con exito');
    }

}
