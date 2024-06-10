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
        $productos = $this->ecommerce->productosUltimos();
        return view('Ecoommerce.inicio', compact('empresaD', 'fotos', 'inicioInfo', 'productos'));
    }

    public function categorias(){
        $empresaD = $this->ecommerce->DatosEmpresa();
        $categorias = $this->ecommerce->categorias();
        $fotos = $this->ecommerce->banners();
        return view('Ecoommerce.categoria', compact('empresaD', 'categorias', 'fotos'));
    }

    public function categoriasProductos($categoria){
        $empresaD = $this->ecommerce->DatosEmpresa();
        $productos = $this->ecommerce->productos($categoria);
        $fotos = $this->ecommerce->banners();
        return view('Ecoommerce.productos', compact('empresaD', 'productos', 'fotos', 'categoria'));
    }

    public function productos($categoria, $producto){
        $empresaD = $this->ecommerce->DatosEmpresa();
        $producto = $this->ecommerce->productosUni($producto);
        $fotos = $this->ecommerce->banners();
        $CategoriaMisma = $this->ecommerce->CategoriaMisma($categoria);
        return view('Ecoommerce.productoUnico', compact('empresaD', 'producto', 'fotos', 'CategoriaMisma'));
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
