<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>
    <link rel="stylesheet" href="<?=URL?>public/css/usuarios.css">
</head>
<body class="my-custom-scroll-bar">
    <?php
         if ($this->reload) {
             header("Location: ".URL."ayuda");
             die();
         }
        // require "../nav.php";
        require "views/nav.php";
        echo $this->error;
       
    ?>
    <main class="m-4">
        <form method="post" action="send_mail"> 
            To:<br>
            <input type="email" name="to"><br> 
            Subject:<br>
            <input type="text" name="subject"><br><br>
            Message:
            <textarea rows="4" cols="40" name="message"> </textarea> 
            <input type="submit" name="send">
        </form>
    </main>

</html>
</body>