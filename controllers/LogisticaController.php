<?php 
namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\Moto;

class LogisticaController{

    public static function invarticulo(Router $router){
        $articulos = Articulo::all();

        $router->render('logistica/invarticulo',[
            'articulos' => $articulos
        ]);
    }
    public static function newarticulo(Router $router){

        $router->render('logistica/newarticulo',[

        ]);
    }
    public static function updarticulo(Router $router){

        $router->render('logistica/updarticulo',[

        ]);
    }

    public static function invmoto(Router $router){
        $motos = Moto::all();
        
        $router->render('logistica/invmoto',[
            'motos' => $motos
        ]);
    }
    public static function newmoto(Router $router){
        $router->render('logistica/newmoto',[
            
        ]);
    }
    
    public static function invplaca(Router $router){
        $router->render('logistica/invplaca',[
            
        ]);
    }
    public static function newplaca(Router $router){
        $router->render('logistica/newplaca',[
            
        ]);
    }

    public static function invtienda(Router $router){
        $router->render('logistica/invtienda',[
            
        ]);
    }
}