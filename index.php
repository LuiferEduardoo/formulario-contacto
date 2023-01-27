<?php
require("mail.php");
// Se crea una función para validar de los datos no esten vacios 
function validate($name, $email, $subject, $message, $button){
    return !empty($name) && !empty($email) && !empty($subject) && !empty($message); 
}

// Se crea una variable para comprobar el esta del correo, si fue enviado, o no
$status = "";

if (isset($_POST['button'])){
    if (validate(...$_POST)){
        // Se crean las variables que guardaran la información pasada por el usuario y se sanitizan
        $name = htmlentities($_POST['name']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $subject = htmlentities($_POST['subject']);
        $message = htmlentities($_POST['message']);

        $body = "$name te envia el siguiente mensaje: <br><br> $message <br><br> Datos de contacto <br> Email:$email";

        // Mandar el correo
        sendMail($subject, $body, $email, $name, true);
        // Si se manda el correo que cambia el estado a "succes"
        $status = "success";
    }
    else
    {
        // Y si no me manda, se cambia el estado a "danger"
        $status = "danger";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Contacto</title>
</head>
<body>
    <?php if($status == "danger"): ?> 
        <div class="alert danger">
            <span>Surgió un problema </span>
        </div>
        <?php elseif ($status == "success"): ?>
            <div class="alert success">
                <span>¡Mensaje enviado con éxito!</span>
            </div>
    <?php endif; ?>

    <form action="#" method="POST">
        <h1>¡Contáctanos!</h1>
        
            <input type="text" name="name" id="name" placeholder="Nombres y apellidos" class="input" required>

            <input type="email" name="email" id="email" placeholder="Email" class="input" required>

            <input type="text" name="subject" id="subject" placeholder="Asunto" class="input" required>

            <textarea name="message" id="message" placeholder="Mensaje" required></textarea>

        <div class="button-container">
            <button type="submit" name="button">Enviar</button>
        </div>

        <div class="contact-info">
            
            <div class="info">
                <span><i class="las la-map-marker-alt"></i> 13 Saw Mill Circle, North Olmested.</span>
            </div>

            <div class="info">
                <span><i class="las la-phone"></i> +1 123 456 7890</span>
            </div>
        </div>
    </form>
    <script src="index.js"></script>
</body>
</html>