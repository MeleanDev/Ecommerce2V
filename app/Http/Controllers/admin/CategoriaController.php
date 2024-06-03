<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoriaRequest;

class CategoriaController extends Controller
{
    public function index(){
        return view('admin.categoria');
    }

    public function crear(CategoriaRequest $datos){
        
        return redirect()->route('categoria');
    }

}
