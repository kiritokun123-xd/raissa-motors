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
use Controllers\AdministrarController;

use MVC\Router;

$router = new Router();

//ZONA PUBLICA

$router->get('/1',[PaginasController::class,'index']);
$router->get('/nosotros',[PaginasController::class,'nosotros']);
$router->get('/mototaxis',[PaginasController::class,'mototaxis']);
$router->post('/mototaxis',[PaginasController::class,'mototaxis']);
$router->get('/motocicletas',[PaginasController::class,'motocicletas']);
$router->post('/motocicletas',[PaginasController::class,'motocicletas']);
$router->get('/cargueros',[PaginasController::class,'cargueros']);
$router->post('/cargueros',[PaginasController::class,'cargueros']);

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
$router->post('/logistica/pedido',[LogisticaController::class, 'invpedido']);
$router->get('/logistica/nuevo-pedido',[LogisticaController::class, 'newpedido']);
$router->post('/logistica/nuevo-pedido',[LogisticaController::class, 'newpedido']);
$router->get('/logistica/actualizar-pedido',[LogisticaController::class, 'updpedido']);
$router->post('/logistica/actualizar-pedido',[LogisticaController::class, 'updpedido']);

$router->get('/logistica/pedidoE',[LogisticaController::class, 'invpedidoE']);
$router->post('/logistica/pedidoE',[LogisticaController::class, 'invpedidoE']);
$router->get('/logistica/nuevo-pedidoE',[LogisticaController::class, 'newpedidoE']);
$router->post('/logistica/nuevo-pedidoE',[LogisticaController::class, 'newpedidoE']);
$router->get('/logistica/actualizar-pedidoE',[LogisticaController::class, 'updpedidoE']);
$router->post('/logistica/actualizar-pedidoE',[LogisticaController::class, 'updpedido']);

$router->get('/administrar/mototaxis',[AdministrarController::class, 'invmototaxi']);
$router->post('/administrar/mototaxis',[AdministrarController::class, 'invmototaxi']);
$router->get('/administrar/nueva-mototaxi',[AdministrarController::class, 'newmototaxi']);
$router->post('/administrar/nueva-mototaxi',[AdministrarController::class, 'newmototaxi']);
$router->get('/administrar/actualizar-mototaxi',[AdministrarController::class, 'updmototaxi']);
$router->post('/administrar/actualizar-mototaxi',[AdministrarController::class, 'updmototaxi']);

$router->get('/administrar/motocicletas',[AdministrarController::class, 'invmotocicleta']);
$router->post('/administrar/motocicletas',[AdministrarController::class, 'invmotocicleta']);
$router->get('/administrar/nueva-motocicleta',[AdministrarController::class, 'newmotocicleta']);
$router->post('/administrar/nueva-motocicleta',[AdministrarController::class, 'newmotocicleta']);
$router->get('/administrar/actualizar-motocicleta',[AdministrarController::class, 'updmotocicleta']);
$router->post('/administrar/actualizar-motocicleta',[AdministrarController::class, 'updmotocicleta']);
$router->get('/administrar/cargueros',[AdministrarController::class, 'invcarguero']);
$router->post('/administrar/cargueros',[AdministrarController::class, 'invcarguero']);
$router->get('/administrar/nuevo-carguero',[AdministrarController::class, 'newcarguero']);
$router->post('/administrar/nuevo-carguero',[AdministrarController::class, 'newcarguero']);
$router->get('/administrar/actualizar-carguero',[AdministrarController::class, 'updcarguero']);
$router->post('/administrar/actualizar-carguero',[AdministrarController::class, 'updcarguero']);


//========PDF===============//
$router->get('/documentos/pdf',[PDFController::class, 'pdf']);
$router->post('/documentos/pdf',[PDFController::class, 'pdf']);

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

$router->post('/ajax/verEspeAjax',[PaginasController::class, 'verespeajax']);
$router->post('/ajax/verEspeMotocicletaAjax',[PaginasController::class, 'verespemajax']);
$router->post('/ajax/verEspeCargueroAjax',[PaginasController::class, 'verespecajax']);

// AUTENTIFICAION
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);
$router->get('/logout',[LoginController::class,'logout']);



$router->comprobarRutas();