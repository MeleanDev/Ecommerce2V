<?php

namespace App\Http\Controllers;

use App\Service\EcommerceWebClass;
use Illuminate\Http\Request;

class EcommerceWebController extends Controller{

    private $ecommerce;

    public function __construct(EcommerceWebClass $ecommerce){
        $this->ecommerce = $ecommerce;
    }

    public function inicio(){
        $empresaD = $this->ecommerce->DatosEmpresa();
        $fotos = $this->ecommerce->banners();
        $inicioInfo = $this->ecommerce->inicio();
        return view('Ecoommerce.inicio', compact('empresaD', 'fotos', 'inicioInfo'));
    }

    public function categorias(){
        $empresaD = $this->ecommerce->DatosEmpresa();
        $categorias = $this->ecommerce->categorias();
        $fotos = $this->ecommerce->banners();
        return view('Ecoommerce.categoria', compact('empresaD', 'categorias', 'fotos'));
    }

    public function productos(){
        $empresaD = $this->ecommerce->DatosEmpresa();
        return view('Ecoommerce.productos', compact('empresaD'));
    }

    public function quienesSomos(){
        $empresaD = $this->ecommerce->DatosEmpresa();
        $fotos = $this->ecommerce->banners();
        $datos = $this->ecommerce->quinesSomos();
        return view('Ecoommerce.quienesSomos', compact('empresaD', 'fotos', 'datos'));
    }

    public function contacto(){
        $empresaD = $this->ecommerce->DatosEmpresa();
        $fotos = $this->ecommerce->banners();
        return view('Ecoommerce.contacto', compact('empresaD', 'fotos'));
    }

    public function SuscripcionWeb(Request $corre){
        $this->ecommerce->suscripcion($corre);
        return redirect()->route('inicio');
    }

}
