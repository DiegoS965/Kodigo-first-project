<?php
    require_once("Controllers/controller.php");
    if(isset($_GET['IDTarea']))
    {
        $delete=new CrudController(new Connection);
        $delete->deleteTask($_GET['IDTarea']);
    }
?>