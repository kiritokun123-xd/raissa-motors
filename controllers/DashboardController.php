<?php

namespace Controllers;

use MVC\Router;

class DashboardController{

    public static function inicio(Router $router){
        $router->render('dashboard/inicio',[
            
        ]);
    }
    public static function invarticulo(Router $router){
        $router->render('dashboard/invarticulo',[
            
        ]);
    }
    public static function invmoto(Router $router){
        $router->render('dashboard/invmoto',[
            
        ]);
    }
    public static function invplaca(Router $router){
        $router->render('dashboard/invplaca',[
            
        ]);
    }
    public static function invtienda(Router $router){
        $router->render('dashboard/invtienda',[
            
        ]);
    }
}