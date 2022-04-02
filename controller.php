<?php
    require_once "db.php";

    interface CrudControllerInterface
    {
        public function saveTask();
        public function getTask();
        public function updateTask();
        public function deleteTask();
        public function tableTask();
    }
    interface FileControllerInterface
    {
        public function uploadTask();
        public function downloadTask();
    }
    
    class CrudController implements CrudControllerInterface
    {
        private $conectar;
        
        public function __construct(DBConnectionInterface $conectar)
        {
            $this->conectar= $conectar;
        }

        public function saveTask() 
        {
            $con=$this->conectar->connectDB();
            $title = $_POST['taskName'];
            $description=$_POST['descriptionTask'];
            $dateDueTask=$_POST['duedateTask']." ".$_POST['duetimeTask'];
            $query = "INSERT INTO tareas(Titulo,Descripcion,Fecha_entrega) VALUES ('$title', '$description','$dateDueTask')";
            $result=mysqli_query($con,$query);

            if(!$result)
            {
                die("Query Failed");
            }

            $_SESSION["message"]='Tarea creada correctamente';
            $_SESSION['message_type']='success';
            $_SESSION['rol']='profesor';
            header("Location: index.php");
        }

        public function getTask()
        {
            $con=$this->conectar->connectDB();
            $id = $_GET['IDTarea'];
            $query = "SELECT * FROM tareas WHERE IDTarea=$id";
            $result = mysqli_query($con,$query);

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
        
        public function updateTask()
        {
            $con=$this->conectar->connectDB();
            $id=$_GET['IDTarea'];
            $title=$_POST['taskName'];
            $description=$_POST['descriptionTask'];
            $dueDate=$_POST['duedateTask']." ".$_POST['duetimeTask'];
            $checkStatus=$_POST['check'];

            $query = "UPDATE tareas set Titulo = '$title', Descripcion = '$description', Fecha_entrega = '$dueDate', Calificado = '$checkStatus' WHERE IDTarea = $id";
            mysqli_query($con,$query);
            
            $_SESSION['message']='Tarea actualizada correctamente';
            $_SESSION['message_type']='warning';
            $_SESSION['rol']='profesor';
            header("Location: index.php");
        }

        public function deleteTask()
        {
            $con=$this->conectar->connectDB();
            $id=$_GET['IDTarea'];
            $query= "DELETE FROM tareas WHERE IDTarea=$id";
            mysqli_query($con,$query);
            
            $_SESSION['message'] = 'Tarea eliminada correctamente';
            $_SESSION['message_type'] = 'danger';
            $_SESSION['rol']='profesor';
            header("Location: index.php");
        }

        public function tableTask()
        {
            $con=$this->conectar->connectDB();
            $query= "SELECT * FROM tareas";
            $result_tasks=mysqli_query($con,$query);
            return $result_tasks;
        }
    }

    class FileController implements FileControllerInterface
    {
        private $conectar;
        
        public function __construct(DBConnectionInterface $conectar)
        {
            $this->conectar= $conectar;
        }
        
        public function uploadTask()
        {
            $con=$this->conectar->connectDB();
            $id=$_GET['IDTarea'];
            $file=$_POST['uploaded_file'];

            $query = "UPDATE tareas set Documento = '$file' WHERE IDTarea = $id";
            mysqli_query($con,$query);

            $_SESSION['message']='Tarea cargada correctamente';
            $_SESSION['message_type']='warning';
            $_SESSION['rol']='alumno';
            header("Location: index.php");
        }

        public function downloadTask()
        {
            $con=$this->conectar->connectDB();
            $id=$_GET['IDTarea'];
            $query = "SELECT * FROM tareas WHERE IDTarea=$id";
            $result = mysqli_query($con,$query);

            $file = mysqli_fetch_object($result);
            //$file
            return $file;
        }
    }
?>