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

    // Inicio

    public function inicio(){
        $datos = $this->EditEcommerce->inicioDatos();
        return view('admin.inicio', compact('datos'));
    }

    public function inicioEdit(Request $datos){
        try {
         $this->EditEcommerce->inicioEliminar();
         $this->EditEcommerce->inicioGuardar($datos['informacion']);
         $respuesta = response()->json(['success' => true]);
         } catch (\Throwable $th) {
             $respuesta = response()->json(['error' => true]);
         }
         return $respuesta;
     }

    //  Banners

    public function banner(){
        $datos = $this->EditEcommerce->bannerDatos();
        return view('admin.banner', compact('datos'));
    }

    // Quienes Somos

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
