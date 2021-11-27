<?php

namespace Controllers;

use MVC\Router;
use Model\UsuarioPermiso;
use Model\Admin;
USE Model\Pedido;

class PDFController{

    public static function pdf(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $id = validarORedireccionar('/logistica/pedido');

        $pedido = Pedido::find($id);

        $router->renderPDF([
            'pedido' => $pedido,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
}