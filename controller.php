<?php
    require_once "db.php";

    interface CrudControllerInterface
    {
        static public function saveTask();
        static public function getTask();
        static public function updateTask();
        static public function deleteTask();
        static public function tableTask();
    }
    interface FileControllerInterface
    {
        static public function uploadTask();
        static public function downloadTask();
    }

    class CrudController implements CrudControllerInterface
    {
        static public function saveTask() 
        {
            $conectar= Connection::connectDB();
            $title = $_POST['taskName'];
            $description=$_POST['descriptionTask'];
            $dateDueTask=$_POST['duedateTask']." ".$_POST['duetimeTask'];
            $query = "INSERT INTO tareas(Titulo,Descripcion,Fecha_entrega) VALUES ('$title', '$description','$dateDueTask')";
            $result=mysqli_query($conectar,$query);

            if(!$result)
            {
                die("Query Failed");
            }

            $_SESSION["message"]='Tarea creada correctamente';
            $_SESSION['message_type']='success';
            $_SESSION['rol']='profesor';
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
            $dueDate=$_POST['duedateTask']." ".$_POST['duetimeTask'];
            $checkStatus=$_POST['check'];

            $query = "UPDATE tareas set Titulo = '$title', Descripcion = '$description', Fecha_entrega = '$dueDate', Calificado = '$checkStatus' WHERE IDTarea = $id";
            mysqli_query($conectar,$query);
            
            $_SESSION['message']='Tarea actualizada correctamente';
            $_SESSION['message_type']='warning';
            $_SESSION['rol']='profesor';
            header("Location: index.php");
        }

        static public function deleteTask()
        {
            
            $conectar=Connection::connectDB();
            $id=$_GET['IDTarea'];
            $query= "DELETE FROM tareas WHERE IDTarea=$id";
            mysqli_query($conectar,$query);
                        
            $_SESSION['message'] = 'Tarea eliminada correctamente';
            $_SESSION['message_type'] = 'danger';
            $_SESSION['rol']='profesor';
            header("Location: index.php");
            
        }

        static public function tableTask()
        {
            $conectar=Connection::connectDB();
            $query= "SELECT * FROM tareas";
            $result_tasks=mysqli_query($conectar,$query);
            return $result_tasks;
        }
    }

    class FileController implements FileControllerInterface
    {
        static public function uploadTask()
        {
            $conectar=Connection::connectDB();
            $id=$_GET['IDTarea'];
            $file=$_POST['uploaded_file'];

            $query = "UPDATE tareas set Documento = '$file' WHERE IDTarea = $id";
            mysqli_query($conectar,$query);

            $_SESSION['message']='Tarea cargada correctamente';
            $_SESSION['message_type']='warning';
            $_SESSION['rol']='alumno';
            header("Location: index.php");
        }

        static public function downloadTask()
        {
            $conectar=Connection::connectDB();
            $id=$_GET['IDTarea'];
            $query = "SELECT * FROM tareas WHERE IDTarea=$id";
            $result = mysqli_query($conectar,$query);

            $file = mysqli_fetch_object($result);
            //$file
            return $file;
        }
    }
?>