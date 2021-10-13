<?php 
namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\ArticuloAlmacen;
use Model\JoinArticuloStock;



class SoldaduraController{

    public static function inventario(Router $router){
        $resultado = $_GET['resultado'] ?? null;
        $articulos = JoinArticuloStock::allMul(3);

        $router->render('soldadura/inventario',[
            'articulos' => $articulos,
            'resultado' => $resultado
        ]);
    }
    public static function updinventario(Router $router){
        $id = validarORedireccionar('/soldadura/inventario');

        $articulo = JoinArticuloStock::findMul($id,3);

        $articuloalmacen = ArticuloAlmacen::findMul($id,3);

        //debuguear($articuloalmacen);

        $errores = ArticuloAlmacen::getErrores();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             //Asignar los atributos
             $args = $_POST['articulo'];
            
             $articuloalmacen->sincronizar($args);

             $errores = $articuloalmacen->validar();

             if(empty($errores)){
                
                $articuloalmacen->guardarRedi('/soldadura/inventario');
            }
        }

        $router->render('soldadura/updinventario',[
            'articulo' => $articulo,
            'errores' => $errores
        ]);
    }

    public static function invsoldadura(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = JoinArticuloStock::filtrarAjaxMul(3,'id',$filtro);

        $router->renderAjax('invsoldaduraajax',[
            'articulos' => $articulos
        ]);
    }
    public static function invsoldaduraN(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = JoinArticuloStock::filtrarAjaxMul(3,'nombre',$filtro);

        $router->renderAjax('invsoldaduraajax',[
            'articulos' => $articulos
        ]);
    }
}