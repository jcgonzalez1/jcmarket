<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php" ?>
    <title>NUEVO PASAJERO</title>
</head>

<body>
    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-8 p-5 bg-white shadow-lg rounded">
                <?php
                include('config.php');
                session_start();
                if (isset($_POST['registro_pasajero'])) {

                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $tipo_documento = $_POST['tipo_documento'];
                    $num_documento = $_POST['num_documento'];
                    $fecha_nacimiento = $_POST['fecha_nacimiento'];
                    $pais = $_POST['pais'];
                    $telefono = $_POST['telefono'];
                    $query = $conn->prepare("SELECT * FROM pasajeros WHERE num_documento=:num_documento");
                    $query->bindParam("num_documento", $num_documento, PDO::PARAM_STR);
                    $query->execute();

                    if ($query->rowCount() > 0) {
                        echo '
                        <div class="alert alert-danger" role="alert">
                        ¡El Nombre ya está registrada!
                        </div>';
                    }

                    if ($query->rowCount() == 0) {
                        $query = $conn->prepare("INSERT INTO pasajeros(nombre,apellido,tipo_documento,num_documento,fecha_nacimiento,pais,telefono) 
                        VALUES (:nombre,:apellido,:tipo_documento,:num_documento,:fecha_nacimiento,:pais,:telefono)");
                        $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
                        $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
                        $query->bindParam("tipo_documento", $tipo_documento, PDO::PARAM_STR);
                        $query->bindParam("num_documento", $num_documento, PDO::PARAM_STR);
                        $query->bindParam("fecha_nacimiento", $fecha_nacimiento, PDO::PARAM_STR);
                        $query->bindParam("pais", $pais, PDO::PARAM_STR);
                        $query->bindParam("telefono", $telefono, PDO::PARAM_STR);
                        $result = $query->execute();

                        if ($result) {
                            echo '
                <div class="alert alert-success" role="alert">
                ¡Tu registro fue exitoso!
                </div>';
                        } else {
                            echo '
                <div class="alert alert-danger" role="alert">
                ¡Algo salió mal!
                </div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>