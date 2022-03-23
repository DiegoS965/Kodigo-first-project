<?php
    include ("db.php");
    require_once("controller.php");
    if(isset($_GET['IDTarea']))
    {
        $delete=CrudController::deleteTask();
    }
?>