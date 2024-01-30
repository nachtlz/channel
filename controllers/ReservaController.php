<?php

class ReservaController {

  public static function index(Router $router) {

    session_start();
    $idHotel = $_SESSION["idHotel"];

    $db = mysqli_connect('localhost', 'root', '', 'channel');
    $query = "SELECT reserva.idReserva, reserva.fechainicio, reserva.fechafin, reserva.adultos, reserva.menores, disponibilidad.codigo, cliente.email
    FROM reserva
    JOIN cliente ON cliente.idCliente = reserva.idCliente
    JOIN disponibilidad ON disponibilidad.idDisponibilidad = reserva.idDisponibilidad
    WHERE disponibilidad.idHotel = $idHotel;";
    $reservas = mysqli_query($db, $query);

    $router->render("reserva/index", [
      "titulo" => "Reservas",
      "reservas" => $reservas
    ]);
  }
}