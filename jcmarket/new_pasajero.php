<?php
include('config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php" ?>
    <title>Clientes</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <h3>Nueva Mascota</h3>
                <hr>
                <form method="post" action="registro_pasajero.php">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input id="apellido" class="form-control" type="text" name="apellido">
                    </div>
                    <div class="form-group">
                        <label for="tipo_documento">Tipo Documento:</label>
                        <input id="tipo_documento" class="form-control" type="text" name="tipo_documento">
                    </div>
                    <div class="form-group">
                        <label for="num_documento">Numero de Documento:</label>
                        <input id="num_documento" class="form-control" type="text" name="num_documento">
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input id="fecha_nacimiento" class="form-control" type="text" name="fecha_nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="pais">Pais:</label>
                        <input id="pais" class="form-control" type="text" name="pais">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input id="telefono" class="form-control" type="text" name="telefono">
                    </div> <br>
                    <button class="btn btn-primary" name="registro_pasajero" type="submit">Guardar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>