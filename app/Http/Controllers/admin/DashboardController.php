<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\admin\DasboardClass;

class DashboardController extends Controller
{
    private $dasboard; 

    public function __construct(DasboardClass $dasboard){
        $this->dasboard = $dasboard;
    }

    public function index(){
        $suscritos = $this->dasboard->suscritosCount();
        $categorias = $this->dasboard->categoriaCount();
        $productos = $this->dasboard->productosCount();
        return view('dashboard', compact('suscritos', 'categorias', 'productos'));
    }
}
