<?php 
namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\Moto;
use Model\ArticuloAlmacen;

use Intervention\Image\ImageManagerStatic as Image;

class LogisticaController{

    public static function invarticulo(Router $router){
        $articulos = Articulo::all();

        $router->render('logistica/invarticulo',[
            'articulos' => $articulos
        ]);
    }
    public static function invarticuloajaxid(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = Articulo::idAjax($filtro);

        $router->renderAjax('invarticuloAjax',[
            'articulos' => $articulos
        ]);
    }
    public static function stockarticuloajax(Router $router){
        $id = $_POST['id'];
        $articulo = Articulo::find($id);
        //debuguear($articulo);
        $articuloalmacen = ArticuloAlmacen::someAjax($id);
        //debuguear($articuloalmacen);

        $router->renderAjax('stockarticuloajax',[
            'articulo' => $articulo,
            'articuloalmacen' => $articuloalmacen
        ]);
    }
    public static function invarticuloajax(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = Articulo::nombreAjax($filtro);

        $router->renderAjax('invarticuloAjax',[
            'articulos' => $articulos
        ]);
    }
    public static function newarticulo(Router $router){
        $articulo = new Articulo();

        $errores = Articulo::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*CREA UNA NUEVA INSTANCIA*/
            $articulo = new Articulo($_POST['articulo']);
            //GENERAR UN NOMBRE UNICO
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //SETEAR LA IMAGEN
            //realiza un RESIZE A LA IMAGEN CON INTERVENTION
            if($_FILES['articulo']['tmp_name']['imagen']){
                $image = Image::make($_FILES['articulo']['tmp_name']['imagen'])->fit(600,600);
                $articulo->setImagen($nombreImagen);
            }

            /*VALIDAR*/
            $errores = $articulo->validar();

            //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                //crear la carpeta imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                //GUARDA LA IMAGEN EN EL SERVIDOR
                if($image){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                //SUBE A LA BD
                $articulo->guardar();
            }
        }

        $router->render('logistica/newarticulo',[
            'articulo' => $articulo,
            'errores' => $errores
        ]);
    }
    public static function updarticulo(Router $router){
        $id = validarORedireccionar('/admin');

        $articulo = Articulo::find($id);

        $errores = Articulo::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['articulo'];
            
            $articulo->sincronizar($args);
            
            $errores = $articulo->validar();
            
            //Validación subida de archivos
            //GENERAR UN NOMBRE UNICO
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            
            if($_FILES['articulo']['tmp_name']['imagen']){
                $image = Image::make($_FILES['articulo']['tmp_name']['imagen'])->fit(600,600);
                $articulo->setImagen($nombreImagen);
            }

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                if($_FILES['articulo']['tmp_name']['imagen']){
                    //GUARDA LA IMAGEN EN EL SERVIDOR
                    if($image){
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }
                }
                
                $articulo->guardar();
            }

        }

        $router->render('logistica/updarticulo',[
            'articulo' => $articulo,
            'errores' => $errores
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