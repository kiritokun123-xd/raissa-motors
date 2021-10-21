<?php

namespace Controllers;

use MVC\Router;
use Model\UsuarioPermiso;

class DashboardController{

    public static function inicio(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);

        $router->render('dashboard/inicio',[
            'arrayPermisos' => $arrayPermisos
        ]);
    }
}