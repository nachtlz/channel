<?php 

require '../Router.php';
require '../controllers/DisponibilidadController.php';
require '../controllers/ReservaController.php';
require '../controllers/HotelController.php';

$url = "/channel/public";

$router = new Router();

//Hoteles
$router->get($url . "/iniciosesion", [HotelController::class, "index"]);
$router->post($url . "/iniciosesion", [HotelController::class, "index"]);

$router->get($url . "/cerrarsesion", [HotelController::class, "cerrar"]);

$router->get($url . "/registrar", [HotelController::class, "registrar"]);
$router->post($url . "/registrar", [HotelController::class, "registrar"]);

//Disponibilidad
$router->get($url . "/misdisponibilidades", [DisponibilidadController::class, "index"]);
$router->post($url . "/misdisponibilidades", [DisponibilidadController::class, "index"]);


//Reserva
$router->get($url . "/misreservas", [ReservaController::class, "index"]);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();