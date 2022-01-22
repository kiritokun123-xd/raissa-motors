<?php

namespace Controllers;

use MVC\Router;
use Model\Mototaxi;
use Model\Motocicleta;
use Model\Carguero;

class PaginasController{

    public static function index(Router $router){
        $router->render('paginas/index',[
            
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros',[
            
        ]);
    }
    public static function verespeajax(Router $router){
        $id = $_POST['id'];
        $mototaxi = Mototaxi::find($id);

        $router->renderAjax('verespeajax',[
            'mototaxi' => $mototaxi
        ]);
    }
    public static function verespemajax(Router $router){
        $id = $_POST['id'];
        $motocicleta = Mototaxi::find($id);

        $router->renderAjax('verespemajax',[
            'motocicleta' => $motocicleta
        ]);
    }
    public static function mototaxis(Router $router){
        $mototaxis = Mototaxi::all(0, 100);
        $router->render('paginas/mototaxis',[
            'mototaxis' => $mototaxis
        ]);
    }
    public static function motocicletas(Router $router){
        $motocicletas = Motocicleta::all(0, 100);
        $router->render('paginas/motocicletas',[
            'motocicletas' => $motocicletas
        ]);
    }
}