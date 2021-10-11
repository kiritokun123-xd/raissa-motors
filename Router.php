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
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
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

        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();//Limpia el buffer
        include __DIR__ . "/views/base2.php";

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