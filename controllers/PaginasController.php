<?php

namespace Controllers;

use MVC\Router;

class PaginasController{

    public static function index(Router $router){
        $router->render('paginas/index',[
            
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros',[
            
        ]);
    }
    public static function mototaxis(Router $router){
        $router->render('paginas/mototaxis',[
            
        ]);
    }
}