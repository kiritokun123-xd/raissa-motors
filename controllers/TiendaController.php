<?php 
namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\ArticuloAlmacen;
use Model\JoinArticuloStock;

use Intervention\Image\ImageManagerStatic as Image;


class TiendaController{

    public static function inventario(Router $router){
        $articulos = JoinArticuloStock::allMul(1);

        $router->render('tienda/inventario',[
            'articulos' => $articulos
        ]);
    }
    public static function updinventario(Router $router){
        $id = validarORedireccionar('/tienda/inventario');

        $articulo = JoinArticuloStock::findMul($id,1);

        $articuloalmacen = ArticuloAlmacen::findMul($id,1);

        //debuguear($articuloalmacen);

        $errores = ArticuloAlmacen::getErrores();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             //Asignar los atributos
             $args = $_POST['articulo'];
            
             $articuloalmacen->sincronizar($args);

             $errores = $articuloalmacen->validar();

             if(empty($errores)){
                
                $articuloalmacen->guardar();
            }
        }

        $router->render('tienda/updinventario',[
            'articulo' => $articulo,
            'errores' => $errores
        ]);
    }

    public static function invtienda(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = JoinArticuloStock::filtrarAjaxMul(1,'id',$filtro);

        $router->renderAjax('invtiendaajax',[
            'articulos' => $articulos
        ]);
    }
    public static function invtiendaN(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = JoinArticuloStock::filtrarAjaxMul(1,'nombre',$filtro);

        $router->renderAjax('invtiendaajax',[
            'articulos' => $articulos
        ]);
    }
}