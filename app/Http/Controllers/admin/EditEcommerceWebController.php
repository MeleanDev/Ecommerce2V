<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BannerRequest;
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

        public function bannerfoto(BannerRequest $foto){
            try {
                $fotoAnterior = $this->EditEcommerce->bannerDatos();
                match ($foto->editar) {
                    '1' => $this->EditEcommerce->eliminarFotoCarpt($fotoAnterior->primaria),
                    '2' => $this->EditEcommerce->eliminarFotoCarpt($fotoAnterior->secundaria),
                    '3' => $this->EditEcommerce->eliminarFotoCarpt($fotoAnterior->quienesSomos),
                };

                $nombre = $this->EditEcommerce->nombreImagen($foto);
                match ($foto->editar) {
                    '1' => $this->EditEcommerce->guardarBannerPrimaria($nombre),
                    '2' => $this->EditEcommerce->guardarBannerSecundaria($nombre),
                    '3' => $this->EditEcommerce->guardarbannerQueSomos($nombre),
                };

                return redirect()->route('editBanner')->with('correctamente', 'La imagen fue cambiada correctamente');
            } catch (\Throwable $th) {
                return redirect()->route('editBanner')->with('incorrectamente', 'Fallo en el sistema al cargar la imagen');
            }
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
