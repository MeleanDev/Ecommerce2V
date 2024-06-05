<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\EditEcommerceWebClass;
use Illuminate\Http\Request;

class EditEcommerceWebController extends Controller
{
    private $EditEcommerce; 

    public function __construct(EditEcommerceWebClass $EditEcommerce){
        $this->EditEcommerce = $EditEcommerce;
    }

    public function inicio(){
        $datos = $this->EditEcommerce->inicioDatos();
        return view('admin.inicio', compact('datos'));
    }

    public function banner(){
        $datos = $this->EditEcommerce->bannerDatos();
        return view('admin.banner', compact('datos'));
    }

    public function quienesSomos(){
        $datos = $this->EditEcommerce->quinesSomosDatos();
        return view('admin.quienesSomos', compact('datos'));
    }

    public function quienesSomosEdit(Request $datos){
       try {
        $this->EditEcommerce->quinesSomosEliminar();
        $this->EditEcommerce->quinesSomosGuardar($datos['informacion']);
        $respuesta = response()->json(['success' => true]);
        } catch (\Throwable $th) {
            $respuesta = response()->json(['error' => true]);
        }
        return $respuesta;
    }
}
