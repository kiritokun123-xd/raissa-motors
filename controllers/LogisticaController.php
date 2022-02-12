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
use Model\Contrato;

use Intervention\Image\ImageManagerStatic as Image;
use Model\Placa;

class LogisticaController{

    //=====ARTICULO======//

    public static function invarticulo(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $resultado = $_GET['resultado'] ?? null;
        

        $limite = 10;
        
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

        $articulos = Articulo::all($offset, $limite);

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

        $limite = 10;
        
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

        $errores = Pedido::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['pedido'];
            
            $pedido->sincronizar($args);
            
            $errores = $pedido->validar();
            

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                
                $pedido->guardar('/logistica/pedido');
            }

        }

        $router->render('logistica/updpedido',[
            'pedido' => $pedido,
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

        $limite = 10;
        
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

        $errores = Pedidoe::getErrores();

        //EJECUTAR EL CODIGO DESPUES DE QuE EL USUARIO ENVIA EL FORMULARIO
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Asignar los atributos
            $args = $_POST['pedido'];
            
            $pedido->sincronizar($args);
            
            $errores = $pedido->validar();
            

            //REVISAR QUE EL AAREGLO DE ERRORES ESTE VACIO
            if(empty($errores)){
                
                $pedido->guardar('/logistica/pedidoE');
            }

        }

        $router->render('logistica/updpedidoE',[
            'pedido' => $pedido,
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