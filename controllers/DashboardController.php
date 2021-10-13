<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class DashboardController{

    public static function inicio(Router $router){
        // $auth = new Admin();
        // $auth->crearusuario();
        $router->render('dashboard/inicio',[
            
        ]);
    }
}