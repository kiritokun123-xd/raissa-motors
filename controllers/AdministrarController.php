<?php 
namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\Mototaxi;
use Model\UsuarioPermiso;
use Model\Admin;

use Intervention\Image\ImageManagerStatic as Image;

class AdministrarController{
    public static function invmototaxi(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $resultado = $_GET['resultado'] ?? null;
        

        $limite = 10;
        
        $pag = $_GET['pag'] ?? null;

        $offset = 0;

        $totalPagina = Mototaxi::totalPagina();

        $totalLink = ceil($totalPagina/ $limite);
        
        if(isset($pag)){
            if($pag < 1){
                $pag = 1;
            }
            $offset = ($pag - 1) * $limite;    
        }

        $mototaxis = Mototaxi::all($offset, $limite);

        $router->render('administrar/invmototaxi',[
            'mototaxis' => $mototaxis,
            'resultado' => $resultado,
            'totalLink' => $totalLink,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
}