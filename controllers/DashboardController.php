<?php

namespace Controllers;

use MVC\Router;

class DashboardController{

    public static function inicio(Router $router){
        $router->render('dashboard/inicio',[
            
        ]);
    }
}