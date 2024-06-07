<?php

namespace App\Service\admin;

use App\Models\Banner;
use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Inicio;
use App\Models\Producto;
use App\Models\QuienesSomo;
use App\Models\SuscritoWeb;

class ConsultasDBClass{
/////////////////////////////////////////////////////////////////////////////
//                          Adminstrador                                   //
/////////////////////////////////////////////////////////////////////////////

    // Borrar archivo de la app
        public function eliminarFotoCarpt($foto){
            unlink(public_path($foto));
        }

    // Empresa
        // Registrar los datos
        public function registroDataEmpresa($datos){
            $empresa = $this->obtenerDatosEmpresa();
            $empresa->nombreEmpresa = $datos[0];
            $empresa->razonSocial = $datos[1];
            $empresa->rif = $datos[2];
            $empresa->correo = $datos[3];
            $empresa->telefono = $datos[4];
            $empresa->direccion = $datos[5];
            $empresa->ciudad = $datos[6];
            $empresa->estado = $datos[7];
            $empresa->codigoPostal = $datos[8];
            $empresa->google = $datos[9];
            $empresa->facebook = $datos[10];
            $empresa->instagram = $datos[11];
            $empresa->foto = $retVale = ($datos[12] === '') ? $empresa->foto : $datos[12];
            $empresa->save();
        }

        // Obetener los datos
        public function obtenerDatosEmpresa(){
            $datos = Empresa::first();
            return $datos;
        }

    // Categoria
        // Crear 
        public function crearCategoria($datos, $foto){
            $categoria = new Categoria();
            $categoria->nombre = $datos->input('nombre'); 
            $categoria->descripcion = $datos->input('descripcion');
            $categoria->foto = $foto;
            $categoria->cantidad = 0;
            $categoria->save();
        }

        // Obetener los datos paginada
        public function obtenerDatosCategorias(){
            $datos = Categoria::all();
            return $datos;
        }

        // Obetener los datos Count
        public function obtenerDatosCategoriasCount(){
            $datos = Categoria::Count();
            return $datos;
        }

        // Obetener los datos de una categoria
        public function categoriaId($id){
            $datos = Categoria::where('id', $id)->first();
            return $datos;
        }

    // Suscritos
        // Obetener los datos
        public function suscritosList(){
            $datos = SuscritoWeb::all();
            return $datos;
        }

        // Obetener los datos Count
        public function suscritosCount(){
            $datos = SuscritoWeb::Count();
            return $datos;
        }

        // Borrar los datos
        public function suscritosBorrarTodo(){
            SuscritoWeb::truncate();
        }

    // Quienes Somos
        // Guardar dato
        public function QuinesSomosGuardar($datos){
            QuienesSomo::create([
                'informacion' => $datos
            ]);
        }
        // Borrar datos
        public function quinesSomosEliminar(){
            QuienesSomo::truncate();
        }

    // Inicio
        // Guardar dato
        public function inicioGuardar($datos){
            Inicio::create([
                'informacion' => $datos
            ]);
        }
        // Borrar datos
        public function inicioEliminar(){
            Inicio::truncate();
        }
    // Banners
        // Editar Banners Primaria
        public function editarBannerPrimaria($datos){
            $banner = Banner::first();
            $banner->primaria = $datos;
            $banner->save();
        }

        // Editar Banners Secundaria
        public function editarBannerSecundaria($datos){
            $banner = Banner::first();
            $banner->secundaria = $datos;
            $banner->save();
        }

        // Editar Banners QueSomos
        public function editarBannerQueSomos($datos){
            $banner = Banner::first();
            $banner->quienesSomos = $datos;
            $banner->save();
        }


/////////////////////////////////////////////////////////////////////////////
//                          Ecommerce                                      //
/////////////////////////////////////////////////////////////////////////////

    // SuscripcionesEcommerce
        public function suscripcionWeb($correo){
            $suscrito = new SuscritoWeb();
            $suscrito->correo = $correo->correo;
            $suscrito->save();
        }

    // Obetener los datos de las Categorias
        public function obtenerDatosCategoriasPaginate(){
            $datos = Categoria::paginate(9);
            return $datos;
        }

/////////////////////////////////////////////////////////////////////////////
//                       Consultas Compartidas                             //
/////////////////////////////////////////////////////////////////////////////

    // Inicio
        public function inicioDatos(){
            $datos = Inicio::first();
            return $datos;
        }

    // Banner
        public function bannerDatos(){
            $datos = Banner::first();
            return $datos;
        }
    // Infomracion Quienes Somos
        public function quienesSomosInformacion(){
            $datos = QuienesSomo::first();
            return $datos;
        }

    // Productos 
        public function productosDatos(){
            $datos = Producto::all();   
            return $datos;
        }
}

