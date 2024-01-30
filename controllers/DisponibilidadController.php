<?php 

class DisponibilidadController {

    public static function index(Router $router) {

        $hotel = [];

        session_start();
        $idHotel = $_SESSION["idHotel"];

        $db = mysqli_connect('localhost', 'root', '', 'channel');
        $query = "SELECT * FROM hotel WHERE hotel.idHotel = '" . $idHotel . "';";
        $resultado = mysqli_query($db, $query);
        $hotel = mysqli_fetch_assoc($resultado);

        $query = "SELECT disponibilidad.codigo, disponibilidad.habsDisponibles, disponibilidad.precio, disponibilidad.fechaInicio, disponibilidad.fechaFin, tipohabitacion.descripcion, tipohabitacion.adultos, tipohabitacion.menores
        FROM disponibilidad
        JOIN tipohabitacion ON tipohabitacion.codigo = disponibilidad.codigo WHERE disponibilidad.idHotel = '" . $idHotel . "';";
        $disponibilidades = mysqli_query($db, $query);

        $query = "SELECT tipohabitacion.codigo FROM tipohabitacion";
        $codigos = mysqli_query($db, $query);

        
        if($_SERVER["REQUEST_METHOD"] === "POST") {

            $codigo = $_POST["codigo"];
            $habsDisponibles = $_POST["habsDisponibles"];
            $precio = $_POST["precio"];

            $fechaInicioV = $_POST["fechaInicio"];
            $fechaFinV = $_POST["fechaFin"];
            
            $fechaInicio = date('Y-m-d', strtotime($_POST["fechaInicio"]));
            $fechaFin = date('Y-m-d', strtotime($_POST["fechaFin"]));

            $query = "INSERT INTO disponibilidad (idHotel, codigo, habsDisponibles, precio, fechaInicio, fechaFin) VALUES ($idHotel, '$codigo', '$habsDisponibles', $precio, '$fechaInicio', '$fechaFin')";
            $insert = mysqli_query($db, $query);

            $query = "SELECT disponibilidad.codigo, disponibilidad.habsDisponibles, disponibilidad.precio, disponibilidad.fechaInicio, disponibilidad.fechaFin, tipohabitacion.descripcion, tipohabitacion.adultos, tipohabitacion.menores
            FROM disponibilidad
            JOIN tipohabitacion ON tipohabitacion.codigo = disponibilidad.codigo WHERE disponibilidad.idHotel = '" . $idHotel . "';";
            $disponibilidades = mysqli_query($db, $query);
        }

        $router->render("disponibilidad/index", [
            "titulo" => "Disponibilidades",
            "disponibilidades" => $disponibilidades,
            "hotel" => $hotel,
            "codigos" => $codigos
        ]);
    }
}