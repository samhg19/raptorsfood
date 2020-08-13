<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//login - logout - register
$route['login'] = 'Auth/Login';
$route['salir'] = 'Auth/Logout';
$route['registro'] = 'Auth/Register';

//rutas del cafeteria
$route['inicio'] = 'Admin/Index';
$route['pedidos'] = 'Admin/Pedidos';
$route['usuarios'] = 'Admin/Usuarios';
$route['menu'] = 'Admin/Menu';
$route['search/getPedido'] = 'Admin/SearchPedido';

//rutas ajax - cafeteria - menu
$route['menu/getProductos'] = 'Producto/GetProductos';
$route['menu/newProduct'] = 'Producto/NewProducto';
$route['menu/updateProduct'] = 'Producto/ChangeStatus';

//rutas ajax - cafeteria - pedidos
$route['pedidos/getPedidos'] = 'Pedido/AllPedidos';
$route['pedidos/getPedidoDetails'] = 'Pedido/GetPedidoDetails';
$route['pedidos/setDoing'] = 'Pedido/doPedido';
$route['pedidos/setDo'] = 'Pedido/pedidoHecho';

//rutas ajax - cafeteria - usuario
$route['usuarios/newAdmin'] = 'Usuario/NewAdmin';
$route['usuarios/getAdmins'] = 'Usuario/GetAdmins';

//rutas del alumno
$route['app'] = 'App/Index';

//rutas ajax - alumno - start
$route['app/start/pedidos'] = 'App/MisPedidosActuales';

//rutas ajax - alumno - historial
$route['app/historial'] = 'App/MisPedidos';
$route['app/detallesPedido'] = 'App/DetallesPedido';

//rutas ajax - alumno - pedidos
$route['app/productos'] = 'App/ProductsPerCategory';
$route['app/carrito'] = 'App/GetAllCarrito';
$route['app/newPedido'] = 'App/GenerarPedido';

$route['default_controller'] = 'Auth/Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
