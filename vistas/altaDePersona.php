<?php 
    require "../utils/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src='/img/logo.png' width=30% height=30% />
    <h1>Alta de Persona</h1>
    
    <form action="/persona/alta" method="post">
        Nombre <input type="text" name="nombre"> <br />
        Apellido <input type="text" name="apellido"> <br />
        Telefono <input type="text" name="telefono"> <br />
        Email <input type="text" name="email"> <br />

        <input type="submit" value="Enviar">
    </form>

    
    <?php if(!isset($parametros['error']) && isset($parametros['exito'])) :?>
        <div style="color: green;">Ta todo bien</div>
    <?php endif;?>

    <?php if(isset($parametros['error']) && isset($parametros["telefonoInvalido"])) :?>
        <div style="color: red;"><?= $parametros['error']?> </div>
    <?php endif;?>

    <?php if(isset($parametros['error']) && isset($parametros["correoRepetido"])) :?>
        <div style="color: red;"><?= $parametros['error']?> </div>
    <?php endif;?>


    
</body>
</html>