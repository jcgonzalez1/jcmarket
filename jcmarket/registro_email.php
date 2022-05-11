<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php";
    // Incluir la libreria PHPMailer

    
    
    ?>
    <title>NUEVO EMAIL</title>
</head>

<body>
    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-8 p-5 bg-white shadow-lg rounded">
                <?php 
               
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;
                
                
                require 'PHPMailer/src/PHPMailer.php';
                require 'PHPMailer/src/Exception.php';
                require 'PHPMailer/src/SMTP.php';
               

                
                $address = $_POST['email'];
                $mail = new PHPMailer();

                 
                //indico a la clase que use SMTP
                $mail­->IsSMTP();
                //permite modo debug para ver mensajes de las cosas que van ocurriendo
                $mail­->SMTPDebug =0;   
                
                //Debo de hacer autenticación SMTP
                $mail­->SMTPAuth = true;
                $mail­->SMTPSecure = "ssl";
                //indico el servidor de Gmail para SMTP
                $mail­->Host = "smtp.gmail.com";
                //indico el puerto que usa Gmail
                $mail­->Port = 465;
                //indico un usuario / clave de un usuario de gmail
                $mail­->Username = "cameronfloy4@gmail.com";
                $mail­->Password = "galaxynote";
                $mail­->SetFrom('cameronfloy4@gmail.com', 'Cameron Floy');
                $mail­->AddReplyTo("cameronfloy4@gmail.com","Cameron Floy");
                $mail­->Subject = "Envío de email usando SMTP de Gmail";
                $mail­->MsgHTML("Hola que tal, esto es el cuerpo del mensaje!");
                //indico destinatario
                
                $mail­->AddAddress($address, "Nombre completo");
                if(!$mail­->Send()) {
                echo "Error al enviar: " . $mail­->ErrorInfo;
                } else {
                echo "Mensaje enviado!";
                }
                        
                
                    

                    

                    

                        
                
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
