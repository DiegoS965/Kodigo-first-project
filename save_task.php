<?php
    include("db.php");
    require_once("controller.php");
    if(isset($_POST['save_task']))
    {
        $save=CrudController::saveTask();
    }
?>