<?php

namespace MVC;

class Router{
    
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }
    
    public function comprobarRutas(){
        session_start();
        $auth = $_SESSION['login'] ?? null;

        //==ARREGLO DE RUTAS PROTEGIDAS==
        $rutas_protegidas = ['/dashboard','/logistica/inventario-articulos','/logistica/nuevo-articulo','/logistica/actualizar-articulo','/logistica/inventario-motos','/logistica/nueva-moto','/logistica/actualizar-moto','/logistica/inventario-placas','/logistica/actualizar-placa','/tienda/inventario','/tienda/actualizar-stock','/ensamblaje/inventario','/ensamblaje/actualizar-stock','/ensamblaje/inventario','/ensamblaje/actualizar-stock','/soldadura/inventario','/soldadura/actualizar-stock','/ajax/invarticuloAjax','/ajax/invarticuloAjaxId','/ajax/stockarticuloAjax','/ajax/invmotoAjaxId','/ajax/invmotoAjax','/ajax/invplacaAjaxP','/ajax/invplacaAjaxN','/ajax/invtienda','/ajax/invtiendaN','/ajax/invensamblaje','/ajax/invensamblajeN','/ajax/insoldadura','/ajax/insoldaduraN',];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        //debuguear($_SERVER);

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //=== proteger las rutas===
        if(in_array($urlActual,$rutas_protegidas) && !$auth){
            header('Location: /login');
        }

        if($fn){
            // La URL existe y hay una funcion asociada
            call_user_func($fn, $this);
        }else{
            echo "Página No Encontrada";
        }
    }

    // mUESTRA UNA VISTA
    public function render($view, $datos = []){

        foreach($datos as $key=>$value){
            //Crea variables desde el key : mensaje ----> $mensaje
            $$key = $value;     
        }

        //inicia un almacenamiento en MEMORIA durante un momento
        ob_start();

        //========= MODIFICAR ESTO PARA CAMBIAR EL LAYOUT=========//
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();//Limpia el buffer
        if($view === 'auth/login'){
            include __DIR__ . "/views/base3.php";
        }else{
            include __DIR__ . "/views/base2.php";
        }

    }
    //muestra ajax
    public function renderAjax($view, $datos = []){

        foreach($datos as $key=>$value){
            //Crea variables desde el key : mensaje ----> $mensaje
            $$key = $value;     
        }
        //inicia un almacenamiento en MEMORIA durante un momento
        ob_start();

        include __DIR__ . "/ajax/$view.php";

    }

}