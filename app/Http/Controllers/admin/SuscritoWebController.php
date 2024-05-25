<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SuscritoWeb;
use Illuminate\Http\Request;

class SuscritoWebController extends Controller
{
    public function index(){
        return view('admin.suscritosWeb');
    }
}