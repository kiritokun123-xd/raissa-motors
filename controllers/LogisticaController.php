<?php 
namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\Moto;
use Model\ArticuloAlmacen;
use Model\UsuarioPermiso;
use Model\Admin;
use Model\Pedido;
use Model\Pedidoe;
use Model\Pedidot;
use Model\Contrato;
use Model\Serie;
use Model\Motor;

use Intervention\Image\ImageManagerStatic as Image;
use Model\Placa;

class LogisticaController{

    //=====ARTICULO======//

    public static function invarticulo(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $resultado = $_GET['resultado'] ?? null;
        

        $limite = 50;
        
        $pag = $_GET['pag'] ?? null;

        $offset = 0;

        $totalPagina = Articulo::totalPagina();

        $totalLink = ceil($totalPagina/ $limite);
        
        if(isset($pag)){
            if($pag < 1){
                $pag = 1;
            }
            $offset = ($pag - 1) * $limite;    
        }

        $articulos = Articulo::allarticulo($offset, $limite);

        $router->render('logistica/invarticulo',[
            'articulos' => $articulos,
            'resultado' => $resultado,
            'totalLink' => $totalLink,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function invarticuloajaxid(Router $router){
        $filtro = $_POST['filtro'];

        $articulos = Articulo::filtrarAjax('id',$filtro);

        $router->renderAjax('invarticuloajax',[
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

        $router->renderAjax('invarticuloajax',[
            'articulos' => $articulos
        ]);
    }
    public static function newarticulo(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

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
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function updarticulo(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

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
                
                $articulo->guardar('/logistica/inventario-articulos');
            }

        }

        $router->render('logistica/updarticulo',[
            'articulo' => $articulo,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }

    //=====MOTO======//

    public static function invmoto(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $resultado = $_GET['resultado'] ?? null;

        $limite = 10;
        
        $pag = $_GET['pag'] ?? null;

        $offset = 0;

        $totalPagina = Moto::totalPagina();

        $totalLink = ceil($totalPagina/ $limite);
        
        if(isset($pag)){
            if($pag < 1){
                $pag = 1;
            }
            $offset = ($pag - 1) * $limite;    
        }
        $motos = Moto::all($offset, $limite);
    
        $router->render('logistica/invmoto',[
            'motos' => $motos,
            'resultado' => $resultado,
            'totalLink' => $totalLink,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
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
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

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
                $moto->guardar('/logistica/inventario-motos');
                
            }
        }
        $router->render('logistica/newmoto',[
            'moto' => $moto,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function updmoto(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

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
                
                $moto->guardar('/logistica/inventario-motos');
            }

        }

        $router->render('logistica/updmoto',[
            'moto' => $moto,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    //=====PEDIDO TRIMOTO======//

    public static function invpedido(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $resultado = $_GET['resultado'] ?? null;

        $limite = 50;
        
        $pag = $_GET['pag'] ?? null;

        $offset = 0;

        $totalPagina = Pedido::totalPagina();

        $totalLink = ceil($totalPagina/ $limite);
        
        if(isset($pag)){
            if($pag < 1){
                $pag = 1;
            }
            $offset = ($pag - 1) * $limite;    
        }
        $pedidos = Pedido::allFechaPedido($offset, $limite);
    
        $router->render('logistica/invpedido',[
            'pedidos' => $pedidos,
            'resultado' => $resultado,
            'totalLink' => $totalLink,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function newpedido(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $pedido = new Pedido();

        $errores = Pedido::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*CREA UNA NUEVA INSTANCIA*/
            $pedido = new Pedido($_POST['pedido']);

            /*VALIDAR*/
            $errores = $pedido->validar();

            //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){

                //SUBE A LA BD
                $pedido->guardar('/logistica/pedido');
                
            }
        }
        $router->render('logistica/newpedido',[
            'pedido' => $pedido,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function invpedidoajaxcs(Router $router){
        $filtro = $_POST['filtro'];

        $pedidos = Pedido::filtrarAjax('serie',$filtro);

        $router->renderAjax('invpedidoajax',[
            'pedidos' => $pedidos
        ]);
    }
    public static function invpedidoajaxcm(Router $router){
        $filtro = $_POST['filtro'];

        $pedidos = Pedido::filtrarAjax('nummotor',$filtro);

        $router->renderAjax('invpedidoajax',[
            'pedidos' => $pedidos
        ]);
    }
    public static function invpedidoajaxc(Router $router){
        $filtro = $_POST['filtro'];

        $pedidos = Pedido::filtrarAjax('cliente',$filtro);

        $router->renderAjax('invpedidoajax',[
            'pedidos' => $pedidos
        ]);
    }
    public static function invpedidoajaxf(Router $router){
        $filtro = $_POST['filtro'];

        $pedidos = Pedido::filtrarAjax('fecha_ent',$filtro);

        $router->renderAjax('invpedidoajax',[
            'pedidos' => $pedidos
        ]);
    }
    public static function updpedido(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $id = validarORedireccionar('/logistica/pedido');

        $pedido = Pedido::find($id);
        
        $series = Serie::getSeries();
        $oldserie = $pedido->getSerie();
        $motores = Motor::getMotores();
        $oldmotor = $pedido->getMotor();
        //debuguear("hola");
        
        $errores = Pedido::getErrores();
        
        
        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['pedido'];
            
            $pedido->sincronizar($args);
            
            $errores = $pedido->validar();
            
            $serie = new Serie();
            $motor = new Motor();
            
            //debuguear($oldserie);
            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                if(empty($oldserie)){
                    $serie->actualizarSerie("asignado",$pedido->serie);
                }else{
                    $serie->actualizarSerie("disponible",$oldserie);           
                    $serie->actualizarSerie("asignado",$pedido->serie);
                }
                if(empty($oldmotor)){
                    $motor->actualizarMotor("asignado",$pedido->nummotor);
                }else{
                    $motor->actualizarMotor("disponible",$oldmotor);           
                    $motor->actualizarMotor("asignado",$pedido->nummotor);
                }
                
                $pedido->guardar('/logistica/pedido');

            }

        }

        $router->render('logistica/updpedido',[
            'pedido' => $pedido,
            'series' => $series,
            'motores' => $motores,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }

     //=====PEDIDO ESTRUCUTURA======//
     public static function invpedidoE(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $resultado = $_GET['resultado'] ?? null;

        $limite = 50;
        
        $pag = $_GET['pag'] ?? null;

        $offset = 0;

        $totalPagina = Pedidoe::totalPagina();

        $totalLink = ceil($totalPagina/ $limite);
        
        if(isset($pag)){
            if($pag < 1){
                $pag = 1;
            }
            $offset = ($pag - 1) * $limite;    
        }
        $pedidos = Pedidoe::allFechaPedido($offset, $limite);
    
        $router->render('logistica/invpedidoe',[
            'pedidos' => $pedidos,
            'resultado' => $resultado,
            'totalLink' => $totalLink,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function newpedidoE(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $pedido = new Pedidoe();

        $errores = Pedidoe::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*CREA UNA NUEVA INSTANCIA*/
            $pedido = new Pedidoe($_POST['pedido']);

            /*VALIDAR*/
            $errores = $pedido->validar();

            //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){

                //SUBE A LA BD
                $pedido->guardar('/logistica/pedidoE');
                
            }
        }
        $router->render('logistica/newpedidoe',[
            'pedido' => $pedido,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function updpedidoE(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $id = validarORedireccionar('/logistica/pedidoE');

        $pedido = Pedidoe::find($id);

        $series = Serie::getSeries();
        $oldserie = $pedido->getSerie();

        $errores = Pedidoe::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['pedido'];
            
            $pedido->sincronizar($args);
            
            $errores = $pedido->validar();
            
            $serie = new Serie();

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){

                if(empty($oldserie)){
                    $serie->actualizarSerie("asignado",$pedido->serie);
                }else{
                    $serie->actualizarSerie("disponible",$oldserie);           
                    $serie->actualizarSerie("asignado",$pedido->serie);
                }
                
                $pedido->guardar('/logistica/pedidoE');
            }

        }

        $router->render('logistica/updpedidoe',[
            'pedido' => $pedido,
            'series' => $series,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function invpedidoajaxe(Router $router){
        $filtro = $_POST['filtro'];

        $pedidos = Pedidoe::filtrarAjax('cliente',$filtro);

        $router->renderAjax('invpedidoajaxe',[
            'pedidos' => $pedidos
        ]);
    }

    //==========PEDIDO TAPIZ============//
    public static function invpedidoT(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $resultado = $_GET['resultado'] ?? null;

        $limite = 10;
        
        $pag = $_GET['pag'] ?? null;

        $offset = 0;

        $totalPagina = Pedidot::totalPagina();

        $totalLink = ceil($totalPagina/ $limite);
        
        if(isset($pag)){
            if($pag < 1){
                $pag = 1;
            }
            $offset = ($pag - 1) * $limite;    
        }
        $pedidos = Pedidot::allFechaPedido($offset, $limite);
    
        $router->render('logistica/invpedidot',[
            'pedidos' => $pedidos,
            'resultado' => $resultado,
            'totalLink' => $totalLink,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function newpedidoT(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $pedido = new Pedidot();

        $errores = Pedidot::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*CREA UNA NUEVA INSTANCIA*/
            $pedido = new Pedidot($_POST['pedido']);

            /*VALIDAR*/
            $errores = $pedido->validar();

            //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){

                //SUBE A LA BD
                $pedido->guardar('/logistica/pedidoT');
                
            }
        }
        $router->render('logistica/newpedidot',[
            'pedido' => $pedido,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function updpedidoT(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $id = validarORedireccionar('/logistica/pedidoE');

        $pedido = Pedidot::find($id);

        $errores = Pedidot::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['pedido'];
            
            $pedido->sincronizar($args);
            
            $errores = $pedido->validar();
            

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                
                $pedido->guardar('/logistica/pedidoT');
            }

        }

        $router->render('logistica/updpedidoT',[
            'pedido' => $pedido,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function invpedidoajaxt(Router $router){
        $filtro = $_POST['filtro'];

        $pedidos = Pedidot::filtrarAjax('cliente',$filtro);

        $router->renderAjax('invpedidoajaxt',[
            'pedidos' => $pedidos
        ]);
    }

    //==========SERIES=============//
    public static function invserie(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $resultado = $_GET['resultado'] ?? null;

        $limite = 50;
        
        $pag = $_GET['pag'] ?? null;

        $offset = 0;

        $totalPagina = Serie::totalPagina();

        $totalLink = ceil($totalPagina/ $limite);
        
        if(isset($pag)){
            if($pag < 1){
                $pag = 1;
            }
            $offset = ($pag - 1) * $limite;    
        }
        $series = Serie::allFechaSerie($offset, $limite);
    
        $router->render('logistica/invserie',[
            'series' => $series,
            'resultado' => $resultado,
            'totalLink' => $totalLink,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function newserie(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $serie = new Serie();

        $errores = Serie::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*CREA UNA NUEVA INSTANCIA*/
            $serie = new Serie($_POST['serie']);

            /*VALIDAR*/
            $errores = $serie->validar();

            //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){

                //SUBE A LA BD
                try{
                    $serie->guardar('/logistica/serie');
                }catch(\Exception $e){
                    $errores[]= "Ya existe esta serie";
                }
                
            }
        }
        $router->render('logistica/newserie',[
            'serie' => $serie,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function asignarajaxs(Router $router){
        $id = $_POST['id'];

        $series = Serie::filtrarAjax('id',$id);

        $router->renderAjax('asignarajaxs',[
            'series' => $series
        ]);
    }
    public static function invserieajax(Router $router){
        $filtro = $_POST['filtro'];

        $series = Serie::filtrarAjax('numserie',$filtro);

        $router->renderAjax('invserieajax',[
            'series' => $series
        ]);
    }
    public static function updserie(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $id = validarORedireccionar('/logistica/serie');

        $serie = Serie::find($id);

        $errores = Serie::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['serie'];
            
            $serie->sincronizar($args);
            
            $errores = $serie->validar();
            

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                
                $serie->guardar('/logistica/serie');
            }

        }

        $router->render('logistica/updserie',[
            'serie' => $serie,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    //==========MOTORES=============//
    public static function invmotor(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $resultado = $_GET['resultado'] ?? null;

        $limite = 50;
        
        $pag = $_GET['pag'] ?? null;

        $offset = 0;

        $totalPagina = Serie::totalPagina();

        $totalLink = ceil($totalPagina/ $limite);
        
        if(isset($pag)){
            if($pag < 1){
                $pag = 1;
            }
            $offset = ($pag - 1) * $limite;    
        }
        $motores = Motor::allFechaSerie($offset, $limite);
    
        $router->render('logistica/invmotor',[
            'motores' => $motores,
            'resultado' => $resultado,
            'totalLink' => $totalLink,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function newmotor(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $motor = new Motor();

        $errores = Motor::getErrores();
        

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*CREA UNA NUEVA INSTANCIA*/
            $motor = new Motor($_POST['motor']);

            /*VALIDAR*/
            $errores = $motor->validar();

            //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){

                //SUBE A LA BD
                try{
                    $motor->guardar('/logistica/motor');
                }catch(\Exception $e){
                    $errores[]= "Ya existe este motor";
                }
                
            }
        }
        $router->render('logistica/newmotor',[
            'motor' => $motor,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function asignarajaxm(Router $router){
        $id = $_POST['id'];

        $motores = Motor::filtrarAjax('id',$id);

        $router->renderAjax('asignarajaxm',[
            'motores' => $motores
        ]);
    }
    public static function invmotorajax(Router $router){
        $filtro = $_POST['filtro'];

        $motores = Motor::filtrarAjax('nummotor',$filtro);

        $router->renderAjax('invmotorajax',[
            'motores' => $motores
        ]);
    }
    public static function updmotor(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $id = validarORedireccionar('/logistica/motor');

        $motor = Motor::find($id);

        $errores = Motor::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['motor'];
            
            $motor->sincronizar($args);
            
            $errores = $motor->validar();
            

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                
                $motor->guardar('/logistica/motor');
            }

        }

        $router->render('logistica/updmotor',[
            'motor' => $motor,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    //==========CONTRATOS=============//
    public static function invcontrato(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);
        
        $resultado = $_GET['resultado'] ?? null;
        
        $limite = 10;
        
        $pag = $_GET['pag'] ?? null;
        
        $offset = 0;
        
        $totalPagina = Contrato::totalPagina();
        
        $totalLink = ceil($totalPagina/ $limite);
        
        if(isset($pag)){
            if($pag < 1){
                $pag = 1;
            }
            $offset = ($pag - 1) * $limite;    
        }
        $contratos = Contrato::allFechaContrato($offset, $limite);
        //debuguear("hola");
        
        $router->render('logistica/invcontrato',[
            'contratos' => $contratos,
            'resultado' => $resultado,
            'totalLink' => $totalLink,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function newcontrato(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $contrato = new Contrato();

        $errores = Contrato::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*CREA UNA NUEVA INSTANCIA*/
            $contrato = new Contrato($_POST['contrato']);

            /*VALIDAR*/
            $errores = $contrato->validar();

            //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){

                //SUBE A LA BD
                $contrato->guardar('/logistica/contrato');
                
            }
        }
        $router->render('logistica/newcontrato',[
            'contrato' => $contrato,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function updcontrato(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $id = validarORedireccionar('/logistica/contrato');

        $contrato = Contrato::find($id);

        $errores = Contrato::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['contrato'];
            
            $contrato->sincronizar($args);
            
            $errores = $contrato->validar();
            

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                
                $contrato->guardar('/logistica/contrato');
            }

        }

        $router->render('logistica/updcontrato',[
            'contrato' => $contrato,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function invcontratoajax(Router $router){
        $filtro = $_POST['filtro'];

        $contratos = Contrato::filtrarAjax('cliente',$filtro);

        $router->renderAjax('invcontratoajax',[
            'contratos' => $contratos
        ]);
    }

    //=====PLACA======//
    
    public static function invplaca(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $resultado = $_GET['resultado'] ?? null;

        $limite = 10;
        
        $pag = $_GET['pag'] ?? null;

        $offset = 0;

        $totalPagina = Placa::totalPagina();

        $totalLink = ceil($totalPagina/ $limite);
        
        if(isset($pag)){
            if($pag < 1){
                $pag = 1;
            }
            $offset = ($pag - 1) * $limite;    
        }
        
        $placas = Placa::all($offset,$limite);
        $router->render('logistica/invplaca',[
            'placas' => $placas,
            'resultado' => $resultado,
            'totalLink' => $totalLink,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function newplaca(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $placa = new Placa();

        $errores = Placa::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            /*CREA UNA NUEVA INSTANCIA*/
            $placa = new Placa($_POST['placa']);
            //GENERAR UN NOMBRE UNICO
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            /*VALIDAR*/
            $errores = $placa->validar();

            //REVISAR QUE EL ARREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){

                //SUBE A LA BD
                $placa->guardar('/logistica/inventario-placas');
                
            }
        }
        $router->render('logistica/newplaca',[
            'placa' => $placa,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
    public static function updplaca(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $id = validarORedireccionar('/logistica/inventario-placas');

        $placa = Placa::find($id);

        $errores = Placa::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['placa'];
            
            $placa->sincronizar($args);
            
            $errores = $placa->validar();
            

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                
                $placa->guardar('/logistica/inventario-placas');
            }

        }

        $router->render('logistica/updplaca',[
            'placa' => $placa,
            'errores' => $errores,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
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