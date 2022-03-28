<!DOCTYPE html>
<?php //require_once ($_SERVER['DOCUMENT_ROOT']."/Guias/ProyectoKodigoG4/"."loginSystem.php")?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de tareas v1.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d3f7d4790.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">Administrador de asignaciones v1.0</a>
        <a href="welcomePage.php" class="navbar-brand">Página de bienvenida</a>
        <form action="login.php" method="post">
            <input type="submit" name=logout_button value="Terminar sesión" class="btn btn-primary btn-block">
        </form>
        
    </nav>