<?php 
namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\Moto;
use Model\ArticuloAlmacen;

use Intervention\Image\ImageManagerStatic as Image;
use Model\Placa;

class LogisticaController{

    public static function invarticulo(Router $router){
        $articulos = Articulo::all();

        $router->render('logistica/invarticulo',[
            'articulos' => $articulos
        ]);
    }
    public static function invarticuloajaxid(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = Articulo::filtrarAjax('id',$filtro);

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

        $articulos = Articulo::filtrarAjax('nombre',$filtro);

        $router->renderAjax('invarticuloAjax',[
            'articulos' => $articulos
        ]);
    }
    public static function newarticulo(Router $router){
        $articulo = new Articulo();

        $errores = Articulo::getErrores();

        $articuloalmacen = new ArticuloAlmacen();

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

                // //GUARDA LA IMAGEN EN EL SERVIDOR
                if($image){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                //SUBE A LA BD
                $articulo->guardar('/logistica/inventario-articulos');
                $articuloalmacen->crearStock();
            }
        }

        $router->render('logistica/newarticulo',[
            'articulo' => $articulo,
            'errores' => $errores
        ]);
    }
    public static function updarticulo(Router $router){
        $id = validarORedireccionar('/logistica/inventario-articulos');

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
    public static function invmotoajax(Router $router){
        $filtro = $_POST['filtro'];

        $motos = Moto::filtrarAjax('vim',$filtro);

        $router->renderAjax('invmotoajax',[
            'motos' => $motos
        ]);
    }
    public static function invmotoajaxid(Router $router){
        $filtro = $_POST['filtro'];

        $motos = Moto::filtrarAjax('id',$filtro);

        $router->renderAjax('invmotoajax',[
            'motos' => $motos
        ]);
    }
    public static function newmoto(Router $router){
        $moto = new Moto();

        $errores = Moto::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*CREA UNA NUEVA INSTANCIA*/
            $moto = new Moto($_POST['moto']);
            //GENERAR UN NOMBRE UNICO
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //SETEAR LA IMAGEN
            //realiza un RESIZE A LA IMAGEN CON INTERVENTION
            if($_FILES['moto']['tmp_name']['imagen']){
                $image = Image::make($_FILES['moto']['tmp_name']['imagen'])->fit(600,600);
                $moto->setImagen($nombreImagen);
            }

            /*VALIDAR*/
            $errores = $moto->validar();

            //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                //crear la carpeta imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                //GUARDA LA IMAGEN EN EL SERVIDOR
                if(isset($image)){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                //SUBE A LA BD
                $moto->guardar();
                
            }
        }
        $router->render('logistica/newmoto',[
            'moto' => $moto,
            'errores' => $errores
        ]);
    }
    public static function updmoto(Router $router){
        $id = validarORedireccionar('/logistica/inventario-motos');

        $moto = Moto::find($id);

        $errores = Moto::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['moto'];
            
            $moto->sincronizar($args);
            
            $errores = $moto->validar();
            
            //Validación subida de archivos
            //GENERAR UN NOMBRE UNICO
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            
            if($_FILES['moto']['tmp_name']['imagen']){
                
                $image = Image::make($_FILES['moto']['tmp_name']['imagen'])->fit(600,600);
                $moto->setImagen($nombreImagen);
                
            }
            

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                if($_FILES['moto']['tmp_name']['imagen']){
                    //GUARDA LA IMAGEN EN EL SERVIDOR
                    if($image){
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                        
                    }
                }
                
                $moto->guardar();
            }

        }

        $router->render('logistica/updmoto',[
            'moto' => $moto,
            'errores' => $errores
        ]);
    }
    
    public static function invplaca(Router $router){
        $placas = Placa::all();

        $router->render('logistica/invplaca',[
            'placas' => $placas
        ]);
    }
    public static function newplaca(Router $router){
        $placa = new Placa();

        $errores = Placa::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*CREA UNA NUEVA INSTANCIA*/
            $placa = new Placa($_POST['placa']);
            //GENERAR UN NOMBRE UNICO
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //SETEAR LA IMAGEN
            //realiza un RESIZE A LA IMAGEN CON INTERVENTION
            // if($_FILES['placa']['tmp_name']['imagen']){
            //     $image = Image::make($_FILES['placa']['tmp_name']['imagen'])->fit(600,600);
            //     $placa->setImagen($nombreImagen);
            // }

            /*VALIDAR*/
            $errores = $placa->validar();

            //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                //crear la carpeta imagenes
                // if(!is_dir(CARPETA_IMAGENES)){
                //     mkdir(CARPETA_IMAGENES);
                // }

                // //GUARDA LA IMAGEN EN EL SERVIDOR
                // if(isset($image)){
                //     $image->save(CARPETA_IMAGENES . $nombreImagen);
                // }

                //SUBE A LA BD
                $placa->guardar();
                
            }
        }
        $router->render('logistica/newplaca',[
            'placa' => $placa,
            'errores' => $errores
        ]);
    }
    public static function updplaca(Router $router){
        $id = validarORedireccionar('/logistica/inventario-placas');

        $placa = Placa::find($id);

        $errores = Placa::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['placa'];
            
            $placa->sincronizar($args);
            
            $errores = $placa->validar();
            
            //Validación subida de archivos
            //GENERAR UN NOMBRE UNICO
            //$nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            
            // if($_FILES['placa']['tmp_name']['imagen']){
                
            //     $image = Image::make($_FILES['placa']['tmp_name']['imagen'])->fit(600,600);
            //     $placa->setImagen($nombreImagen);
                
            // }
            

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                // if($_FILES['placa']['tmp_name']['imagen']){
                //     //GUARDA LA IMAGEN EN EL SERVIDOR
                //     if($image){
                //         $image->save(CARPETA_IMAGENES . $nombreImagen);
                        
                //     }
                // }
                
                $placa->guardar();
            }

        }

        $router->render('logistica/updplaca',[
            'placa' => $placa,
            'errores' => $errores
        ]);
    }
    public static function invplacaajaxn(Router $router){
        $filtro = $_POST['filtro'];

        $placas = Placa::filtrarAjax('propietario',$filtro);

        $router->renderAjax('invplacaajax',[
            'placas' => $placas
        ]);
    }
    public static function invplacaajaxp(Router $router){
        $filtro = $_POST['filtro'];

        $placas = Placa::filtrarAjax('nombre',$filtro);

        $router->renderAjax('invplacaajax',[
            'placas' => $placas
        ]);
    }

}