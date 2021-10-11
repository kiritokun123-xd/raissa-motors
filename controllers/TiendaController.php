<?php 
namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\ArticuloAlmacen;

use Intervention\Image\ImageManagerStatic as Image;


class TiendaController{

    public static function inventario(Router $router){
        $articulos = Articulo::all();
        $router->render('tienda/inventario',[
            'articulos' => $articulos
        ]);
    }

    public static function invtienda(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = Articulo::filtrarAjax('id',$filtro);

        $router->renderAjax('invtiendaajax',[
            'articulos' => $articulos
        ]);
    }
    public static function invtiendaN(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = Articulo::filtrarAjax('nombre',$filtro);

        $router->renderAjax('invtiendaajax',[
            'articulos' => $articulos
        ]);
    }
}