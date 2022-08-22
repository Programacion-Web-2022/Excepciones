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
    <h1>Lista de Persona</h1>
    
    <?php if(isset($parametros['vacio'])) :?>
        <div style="color: red;">No hay personas</div>
    <?php endif;?>

    <?php if(!isset($parametros['vacio'])) 
        echo "<pre>";
        var_dump($parametros["personas"]);
    ?>

    <?php if(isset($parametros['error']) && isset($parametros["correoRepetido"])) :?>
        <div style="color: red;"><?= $parametros['error']?> </div>
    <?php endif;?>


    
</body>
</html>