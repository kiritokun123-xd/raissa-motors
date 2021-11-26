<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LogisticaController;
use Controllers\DashboardController;
use Controllers\TiendaController;
use Controllers\EnsamblajeController;
use Controllers\SoldaduraController;
use Controllers\UsuarioController;
use Controllers\LoginController;
use Controllers\IndicadorController;
use Controllers\PaginasController;
use Controllers\PDFController;

use MVC\Router;

$router = new Router();

//ZONA PUBLICA

$router->get('/',[PaginasController::class,'index']);

//Zona Dashboard
$router->get('/dashboard',[DashboardController::class, 'inicio']);

$router->get('/indicador/rot-mercancia',[IndicadorController::class, 'indicador1']);
$router->get('/indicador/actualizar-indicador',[IndicadorController::class, 'updindicador1']);
$router->post('/indicador/actualizar-indicador',[IndicadorController::class, 'updindicador1']);
$router->get('/indicador/nuevo-indicador',[IndicadorController::class, 'newindicador1']);
$router->post('/indicador/nuevo-indicador',[IndicadorController::class, 'newindicador1']);

$router->get('/indicador/cost-uni-alma',[IndicadorController::class, 'indicador2']);
$router->get('/indicador/actualizar-indicador2',[IndicadorController::class, 'updindicador2']);
$router->post('/indicador/actualizar-indicador2',[IndicadorController::class, 'updindicador2']);
$router->get('/indicador/nuevo-indicador2',[IndicadorController::class, 'newindicador2']);
$router->post('/indicador/nuevo-indicador2',[IndicadorController::class, 'newindicador2']);
//ZONA LOGISTICA
$router->get('/logistica/inventario-articulos',[LogisticaController::class, 'invarticulo']);
$router->post('/logistica/inventario-articulos',[LogisticaController::class, 'invarticulo']);
$router->get('/logistica/nuevo-articulo',[LogisticaController::class, 'newarticulo']);
$router->post('/logistica/nuevo-articulo',[LogisticaController::class, 'newarticulo']);
$router->get('/logistica/actualizar-articulo',[LogisticaController::class, 'updarticulo']);
$router->post('/logistica/actualizar-articulo',[LogisticaController::class, 'updarticulo']);

$router->get('/logistica/inventario-motos',[LogisticaController::class, 'invmoto']);
$router->get('/logistica/nueva-moto',[LogisticaController::class, 'newmoto']);
$router->post('/logistica/nueva-moto',[LogisticaController::class, 'newmoto']);
$router->get('/logistica/actualizar-moto',[LogisticaController::class, 'updmoto']);
$router->post('/logistica/actualizar-moto',[LogisticaController::class, 'updmoto']);

$router->get('/logistica/inventario-placas',[LogisticaController::class, 'invplaca']);
$router->get('/logistica/nueva-placa',[LogisticaController::class, 'newplaca']);
$router->post('/logistica/nueva-placa',[LogisticaController::class, 'newplaca']);
$router->get('/logistica/actualizar-placa',[LogisticaController::class, 'updplaca']);
$router->post('/logistica/actualizar-placa',[LogisticaController::class, 'updplaca']);

$router->get('/logistica/pedido',[LogisticaController::class, 'invpedido']);
$router->get('/logistica/nuevo-pedido',[LogisticaController::class, 'newpedido']);
$router->post('/logistica/nuevo-pedido',[LogisticaController::class, 'newpedido']);
$router->get('/logistica/actualizar-pedido',[LogisticaController::class, 'updpedido']);
$router->post('/logistica/actualizar-pedido',[LogisticaController::class, 'updpedido']);

//========PDF===============//
$router->get('/documentos/pdf',[PDFController::class, 'pdf']);

//=======TIENDA=============//

$router->get('/tienda/inventario',[TiendaController::class, 'inventario']);
$router->get('/tienda/actualizar-stock',[TiendaController::class, 'updinventario']);
$router->post('/tienda/actualizar-stock',[TiendaController::class, 'updinventario']);
//=======ENSAMBLAJE=============//

$router->get('/ensamblaje/inventario',[EnsamblajeController::class, 'inventario']);
$router->get('/ensamblaje/actualizar-stock',[EnsamblajeController::class, 'updinventario']);
$router->post('/ensamblaje/actualizar-stock',[EnsamblajeController::class, 'updinventario']);
//=======SOLDADURA=============//

$router->get('/soldadura/inventario',[SoldaduraController::class, 'inventario']);
$router->get('/soldadura/actualizar-stock',[SoldaduraController::class, 'updinventario']);
$router->post('/soldadura/actualizar-stock',[SoldaduraController::class, 'updinventario']);

//=======ACCESOS=============//
$router->get('/acceso/usuario',[UsuarioController::class, 'usuario']);
$router->get('/acceso/nuevo-usuario',[UsuarioController::class, 'newusuario']);
$router->post('/acceso/nuevo-usuario',[UsuarioController::class, 'newusuario']);
$router->get('/acceso/actualizar-usuario',[UsuarioController::class, 'updusuario']);
$router->post('/acceso/actualizar-usuario',[UsuarioController::class, 'updusuario']);
$router->get('/acceso/permiso-usuario',[UsuarioController::class, 'permiso']);
$router->post('/acceso/permiso-usuario',[UsuarioController::class, 'permiso']);

//==========================zona ajax=================
$router->post('/ajax/invarticuloAjax',[LogisticaController::class, 'invarticuloajax']);
$router->post('/ajax/invarticuloAjaxId',[LogisticaController::class, 'invarticuloajaxid']);
$router->post('/ajax/stockarticuloAjax',[LogisticaController::class, 'stockarticuloajax']);
$router->post('/ajax/invmotoAjaxId',[LogisticaController::class, 'invmotoajaxid']);
$router->post('/ajax/invmotoAjax',[LogisticaController::class, 'invmotoajax']);
$router->post('/ajax/invplacaAjaxP',[LogisticaController::class, 'invplacaajaxp']);
$router->post('/ajax/invplacaAjaxN',[LogisticaController::class, 'invplacaajaxn']);
$router->post('/ajax/invtienda',[TiendaController::class, 'invtienda']);
$router->post('/ajax/invtiendaN',[TiendaController::class, 'invtiendaN']);
$router->post('/ajax/invensamblaje',[EnsamblajeController::class, 'invensamblaje']);
$router->post('/ajax/invensamblajeN',[EnsamblajeController::class, 'invensamblajeN']);
$router->post('/ajax/insoldadura',[SoldaduraController::class, 'invsoldadura']);
$router->post('/ajax/insoldaduraN',[SoldaduraController::class, 'invsoldaduraN']);
$router->post('/ajax/invusuarioAjaxId',[UsuarioController::class, 'invusuarioajaxid']);
$router->post('/ajax/invusuarioAjaxN',[UsuarioController::class, 'invusuarioajaxN']);
$router->post('/ajax/invpedidoAjaxC',[LogisticaController::class, 'invpedidoajaxc']);
$router->post('/ajax/invpedidoAjaxF',[LogisticaController::class, 'invpedidoajaxf']);

$router->post('/ajax/indicador1Ajax',[IndicadorController::class, 'indicador1ajax']);
$router->post('/ajax/indicador1AjaxG',[IndicadorController::class, 'indicador1ajaxG']);

$router->post('/ajax/indicador2Ajax',[IndicadorController::class, 'indicador2ajax']);
$router->post('/ajax/indicador2AjaxG',[IndicadorController::class, 'indicador2ajaxG']);

// AUTENTIFICAION
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);
$router->get('/logout',[LoginController::class,'logout']);



$router->comprobarRutas();