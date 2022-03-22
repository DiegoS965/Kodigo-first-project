<?php
    include("db.php");
    require_once("controller.php");
    if(isset($_POST['save_task']))
    {
        /* $title = $_POST['taskName'];
        $description=$_POST['descriptionTask'];
        
        //$query = "INSERT INTO profesor/admin(title,description) VALUES ('$title', '$description')";
        //$result=mysqli_query($conn,$query);
        $_SESSION["message"]='Task saved succesfully';
        $_SESSION['message_type']='success';
        header("Location: index.php"); */
        $print=CrudController::saveTask();
    }
?>