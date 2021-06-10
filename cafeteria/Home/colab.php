<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: Home.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: Home.php');
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>Colaborador</h1>
    <a href="cerrar.php">cerrar sesion</a>
</body>
</html>