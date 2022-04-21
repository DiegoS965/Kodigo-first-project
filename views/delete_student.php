<?php
    require_once("../Controllers/controller.php");
    if(isset($_GET['IDAlumno']))
    {
        $delete=new StudentCrudController(new Connection);
        $delete->deleteStudent($_GET['IDAlumno']);
        header("Location: view_student.php");
    }
?>