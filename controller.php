<?php
    require_once "db.php";
    class CrudController
    {
        static public function saveTask()
        {
            $conectar=Connection::connectDB();
            $title = $_POST['taskName'];
            $description=$_POST['descriptionTask'];
            //$dateTask=$_POST['dateTask'];
            $dateDueTask=$_POST['duedateTask'];
            $query = "INSERT INTO tareas(Titulo,Descripcion,Fecha_entrega) VALUES ('$title', '$description','$dateDueTask')";
            $result=mysqli_query($conectar,$query);
            if(!$result)
            {
                die("Query Failed");
            }
            $_SESSION["message"]='Task saved succesfully';
            $_SESSION['message_type']='success';
            header("Location: index.php");
        }
        
        static public function updateTask()
        {

        }

        static public function deleteTask()
        {

        }
    }
?>