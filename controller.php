<?php
    require_once "db.php";
    class CrudController
    {
        static public function saveTask()
        {
            $conectar=Connection::connectDB();
            $title = $_POST['taskName'];
            $description=$_POST['descriptionTask'];
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

        static public function getTask()
        {
            $conectar=Connection::connectDB();
            $id = $_GET['IDTarea'];
            $query = "SELECT * FROM tareas WHERE IDTarea=$id";
            $result = mysqli_query($conectar,$query);

            if(mysqli_num_rows($result)==1)
            {
                $row = mysqli_fetch_array($result);
                $title = $row['Titulo'];
                $description = $row['Descripcion'];
                $dueDate = $row['Fecha_entrega'];
                $check = $row['Calificado'];
                $data= array($title,$description,$dueDate,$check);
            }

            return $data;
        }
        
        static public function updateTask()
        {
            $conectar=Connection::connectDB();
            $id=$_GET['IDTarea'];
            $title=$_POST['taskName'];
            $description=$_POST['descriptionTask'];
            $dueDate=$_POST['duedateTask'];
            $checkStatus=$_POST['check'];

            $query = "UPDATE tareas set Titulo = '$title', Descripcion = '$description', Fecha_entrega = '$dueDate', Calificado = '$checkStatus' WHERE IDTarea = $id";
            mysqli_query($conectar,$query);
            
            $_SESSION['message']='Task updated successfully';
            $_SESSION['message_type']='warning';
            header("Location: index.php");
        }

        static public function deleteTask()
        {

        }
    }
?>