<?php

namespace Controllers;

use MVC\Router;
use Model\UsuarioPermiso;
use Model\Admin;
use Model\Pedido;
use Model\Pedidoe;

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
    public static function pdf2(Router $router){
        $auth = $_SESSION['id'];
        $arrayPermisos = UsuarioPermiso::mostrarPermisos($auth);
        $nick = Admin::mostrarNombre($auth);

        $id = validarORedireccionar('/logistica/pedidoE');

        $pedido = Pedidoe::find($id);
        $router->renderPDF2([
            'pedido' => $pedido,
            'arrayPermisos' => $arrayPermisos,
            'nick' => $nick
        ]);
    }
}