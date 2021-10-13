<?php 
namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\ArticuloAlmacen;
use Model\JoinArticuloStock;

use Intervention\Image\ImageManagerStatic as Image;


class EnsamblajeController{

    public static function inventario(Router $router){
        $resultado = $_GET['resultado'] ?? null;
        $articulos = JoinArticuloStock::allMul(2);

        $router->render('ensamblaje/inventario',[
            'articulos' => $articulos,
            'resultado' => $resultado
        ]);
    }
    public static function updinventario(Router $router){
        $id = validarORedireccionar('/ensamblaje/inventario');

        $articulo = JoinArticuloStock::findMul($id,2);

        $articuloalmacen = ArticuloAlmacen::findMul($id,2);

        //debuguear($articuloalmacen);

        $errores = ArticuloAlmacen::getErrores();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             //Asignar los atributos
             $args = $_POST['articulo'];
            
             $articuloalmacen->sincronizar($args);

             $errores = $articuloalmacen->validar();

             if(empty($errores)){
                
                $articuloalmacen->guardarRedi('/ensamblaje/inventario');
            }
        }

        $router->render('ensamblaje/updinventario',[
            'articulo' => $articulo,
            'errores' => $errores
        ]);
    }

    public static function invensamblaje(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = JoinArticuloStock::filtrarAjaxMul(2,'id',$filtro);

        $router->renderAjax('invensamblajeajax',[
            'articulos' => $articulos
        ]);
    }
    public static function invensamblajeN(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = JoinArticuloStock::filtrarAjaxMul(2,'nombre',$filtro);

        $router->renderAjax('invensamblajeajax',[
            'articulos' => $articulos
        ]);
    }
}