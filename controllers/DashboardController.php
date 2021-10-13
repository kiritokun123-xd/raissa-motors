<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class DashboardController{

    public static function inicio(Router $router){

        $router->render('dashboard/inicio',[
            
        ]);
    }
}