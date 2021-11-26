<?php

namespace Controllers;

use MVC\Router;

class PDFController{

    public static function pdf(Router $router){

        $router->renderPDF([
            
        ]);
    }
}