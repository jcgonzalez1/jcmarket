<?php
session_start();
include('config.php');
include_once 'class/pasajeros.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$crud = new crud($conn);
//validacion del boton actualizar
if (isset($_POST['btn-update'])) {
    $id = $_GET['edit_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_documento = $_POST['tipo_documento'];
    $num_documento = $_POST['num_documento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $pais = $_POST['pais'];
    $telefono = $_POST['telefono'];
    //hace referencia a la funcion update
    if ($crud->update($id, $nombre, $apellido, $tipo_documento, $num_documento, $fecha_nacimiento, $pais, $telefono)) {
        $msg = "<b>WOW, Actualizacion exitosa!</b>";
    } else {
        $msg = "<b>ERROR, algo anda mal</b>";
    }
}
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    extract($crud->getID($id));
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
    <title>PASAJEROS</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <h3>ACTUALIZAR PASAJERO</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" value="<?php echo $nombre; ?>" class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input id="apellido" value="<?php echo $apellido; ?>" class="form-control" type="apellido" name="apellido">
                    </div>
                    <div class="form-group">
                        <label for="tipo_documento">Tipo Documento</label>
                        <input id="tipo_documento" value="<?php echo $tipo_documento; ?>" class="form-control" type="apellido" name="tipo_documento">
                    </div>
                    <div class="form-group">
                        <label for="num_documento">Num Documento</label>
                        <input id="num_documento" value="<?php echo $num_documento; ?>" class="form-control" type="apellido" name="num_documento">
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <input id="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>" class="form-control" type="apellido" name="fecha_nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="pais">Pais</label>
                        <input id="pais" value="<?php echo $pais; ?>" class="form-control" type="apellido" name="pais">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" value="<?php echo $telefono; ?>" class="form-control" type="apellido" name="telefono">
                    </div><br>
                    <button class="btn btn-primary" name="btn-update" type="submit">Actualizar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>