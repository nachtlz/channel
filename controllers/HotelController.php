<?php 

class HotelController {

    public static function index(Router $router) {

        $alerta = "";

        if($_SERVER["REQUEST_METHOD"] === "POST") {
    
            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = mysqli_connect('localhost', 'root', '', 'channel');
            $query = "SELECT * FROM hotel WHERE hotel.email = '" . $email . "';";
            $resultado = mysqli_query($db, $query);
            
            if(mysqli_num_rows($resultado) != 0) {
                
                while($hotel = mysqli_fetch_assoc($resultado)) {
                    if (password_verify($password, $hotel["password"])) {
                        session_start();
                        $_SESSION["idHotel"] = $hotel["idHotel"];
                        header("Location: /channel/public/misdisponibilidades");
                    } else {
                        $alerta = "Password incorrecto.";
                    }
                }

            } else {
                $alerta = "El correo no está registrado.";
            }

        }
            
        $router->render("principal/index", [
            "titulo" => "Inicio sesión",
            "alerta" => $alerta
        ]);
        
    }

    public static function cerrar(Router $router) {
        session_start();
        $_SESSION = [];
        header("Location: /channel/public/iniciosesion");
    }
}