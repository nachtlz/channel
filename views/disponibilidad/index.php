<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="menu-item">
            <div class="container">
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="/channel/public/misreservas">Reservas</a></li>
                                    <li><a href="/channel/public/cerrarsesion">Cerrar sesión</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Disponibilidad de <?php echo $hotel["nombre"]; ?></h2>
                        <p><?php echo $hotel["descripcion"]; ?> Hotel de <?php echo $hotel["categoria"]; ?> estrellas</p>
                        <div class="bt-option">
                            <a href="/channel/public/iniciosesion"><?php echo $hotel["nombre"]; ?></a>
                            <span>Disponibilidad</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="col-md-12">
                <div class="booking-form">
                    <div class="centrar">
                        <h3>Inserta disponibilidad de habitaciones</h3>
                    </div>
                    <form action="/channel/public/misdisponibilidades" class="formulario" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="check-date">
                                <label for="codigo">Codigo Habitacion:</label>
                                    <select class="form-select" id="codigo" name="codigo">
                                    <?php 
                                    var_dump($codigos);
                                    foreach($codigos as $codigo) { ?>
                                            <option value="<?php echo $codigo["codigo"]; ?>">
                                                <?php echo $codigo["codigo"]; ?>
                                            </option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="check-date">
                                    <label>Cantidad:</label>
                                    <input type="number" id="habsDisponibles" name="habsDisponibles">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="check-date">
                                    <label>Precio/Noche:</label>
                                    <input type="text" id="precio" name="precio">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="check-date">
                                    <label for="date-in">Fecha Inicio:</label>
                                    <input type="text" class="date-input" id="date-in" name="fechaInicio">
                                    <i class="icon_calendar"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="check-date">
                                    <label for="date-out">Fecha Fin:</label>
                                    <input type="text" class="date-input" id="date-out" name="fechaFin">
                                    <i class="icon_calendar"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="booking_submit" type="submit">Insertar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <h3 style="margin-bottom: 25px">Disponibilidad total en <?php echo $hotel["nombre"]; ?></h3>
            <div class="row">
                <?php
                    if(mysqli_num_rows($disponibilidades) == 0) {
                        ?>
                        <h3>No hay disponibilidades registradas para este hotel.</h3>
                        <?php
                    } else {
                ?>
                <?php while($dispo = mysqli_fetch_assoc($disponibilidades)) {?>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img src="img/<?php echo $hotel["imagen"]; ?>.jpg" alt="">
                            <div class="ri-text">
                                <h4><?php echo $dispo["descripcion"]; ?></h4>
                                <h3><?php echo $dispo["precio"]; ?>€<span>/Pernight</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Codigo:</td>
                                            <td><?php echo $dispo["codigo"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Adultos:</td>
                                            <td><?php echo $dispo["adultos"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Menores:</td>
                                            <td><?php echo $dispo["menores"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Fecha Inicio:</td>
                                            <td><?php echo $dispo["fechaInicio"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Fecha Fin:</td>
                                            <td><?php echo $dispo["fechaFin"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Cantidad:</td>
                                            <td><?php echo $dispo["habsDisponibles"]; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>