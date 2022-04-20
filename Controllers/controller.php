<?php
    require_once "db.php";

    interface CrudControllerInterface
    {
        public function saveTask($newData);
        public function getTask($taskID);
        public function updateTask($taskID,$updatedTaskData);
        public function deleteTask($taskID);
        public function tableTask();
    }
    interface FileControllerInterface
    {
        public function uploadTask($taskID,$file);
        public function downloadTask($taskID);
    }

    class CrudController implements CrudControllerInterface
    {
        private $conectar;
        
        public function __construct(DBConnectionInterface $conectar)
        {
            $this->conectar= $conectar;
        }
        
        public function saveTask($newData) 
        {
            $con=$this->conectar->connectDB();
            $query = "INSERT INTO tareas(Titulo,Descripcion,Fecha_entrega) VALUES ('$newData[0]', '$newData[1]','$newData[2]')";
            $result=mysqli_query($con,$query);

            if(!$result)
            {
                die("Consulta fallada");
            }

            $_SESSION["message"]='Tarea creada correctamente';
            $_SESSION['message_type']='success';
            $_SESSION['rol']='profesor';
            //header("Location: index.php");
        }

        public function getTask($taskID)
        {
            $con=$this->conectar->connectDB();
            $query = "SELECT * FROM tareas WHERE IDTarea=$taskID LIMIT 1";
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
        
        public function updateTask($taskID,$updatedTaskData)
        {
            $con=$this->conectar->connectDB();

            $query = "UPDATE tareas set Titulo = '$updatedTaskData[0]', Descripcion = '$updatedTaskData[1]', Fecha_entrega = '$updatedTaskData[2]', Calificado = '$updatedTaskData[3]' WHERE IDTarea = $taskID";
            mysqli_query($con,$query);
            
            $_SESSION['message']='Tarea actualizada correctamente';
            $_SESSION['message_type']='warning';
            $_SESSION['rol']='profesor';
            //header("Location: index.php");
        }

        public function deleteTask($taskID)
        {
            $con=$this->conectar->connectDB();

            $query= "DELETE FROM tareas WHERE IDTarea=$taskID";
            mysqli_query($con,$query);
            
            $_SESSION['message'] = 'Tarea eliminada correctamente';
            $_SESSION['message_type'] = 'danger';
            $_SESSION['rol']='profesor';
            //header("Location: index.php");
        }

        public function tableTask()
        {
            $con=$this->conectar->connectDB();
            $query= "SELECT * FROM tareas";
            $result=mysqli_query($con,$query);
            return $result;
        }
    }

    class StudentCrudController extends CrudController
    {
        private $conectar;
        
        public function __construct(DBConnectionInterface $conectar)
        {
            $this->conectar= $conectar;
        }

        public function saveStudent($newStudentData)
        {
            $con=$this->conectar->connectDB();
            $query = "INSERT INTO alumnos(Nombre,Email,Contrasenya) VALUES ('$newStudentData[0]', '$newStudentData[1]','$newStudentData[2]')";
            $result=mysqli_query($con,$query);

            if(!$result)
            {
                die("Consulta fallada, no pueden haber duplicados");
            }

            $_SESSION["message"]='Cuenta de alumno creada correctamente';
            $_SESSION['message_type']='success';
            $_SESSION['rol']='profesor';
            //header("Location: ../index.php");
        }
        public function getStudent($studentID)
        {
            $con=$this->conectar->connectDB();
            $query = "SELECT * FROM alumnos WHERE IDAlumno=$studentID LIMIT 1";
            $result = mysqli_query($con,$query);

            if(mysqli_num_rows($result)==1)
            {
                $row = mysqli_fetch_array($result);
                $studentName = $row['Nombre'];
                $studentEmail = $row['Email'];
                $strudentPassword = $row['Contrasenya'];
                $data= array($studentName,$studentEmail,$strudentPassword);
            }

            return $data;
        }
        public function updateStudent($studentID,$updatedStudentData)
        {
            $con=$this->conectar->connectDB();

            $query = "UPDATE alumnos set Nombre = '$updatedStudentData[0]', Email = '$updatedStudentData[1]', Contrasenya = '$updatedStudentData[2]' WHERE IDAlumno = $studentID";
            mysqli_query($con,$query);
            
            $_SESSION['message']='Cuenta de alumno actualizada correctamente';
            $_SESSION['message_type']='warning';
            $_SESSION['rol']='profesor';
            //header("Location: view_student.php");
        }
        public function deleteStudent($studentID)
        {
            $con=$this->conectar->connectDB();

            $query= "DELETE FROM alumnos WHERE IDAlumno=$studentID";
            mysqli_query($con,$query);
            
            $_SESSION['message'] = 'Cuenta de alumno eliminada correctamente';
            $_SESSION['message_type'] = 'danger';
            $_SESSION['rol']='profesor';
            //header("Location: ../index.php");
        }
        public function tableStudent()
        {
            $con=$this->conectar->connectDB();
            $query= "SELECT * FROM alumnos";
            $result=mysqli_query($con,$query);
            return $result;
        }
    }

    class FileController implements FileControllerInterface
    {
        private $conectar;
        
        public function __construct(DBConnectionInterface $conectar)
        {
            $this->conectar= $conectar;
        }
        
        public function uploadTask($taskID,$file)
        {
            $con=$this->conectar->connectDB();

            $query = "UPDATE tareas set Documento = '$file' WHERE IDTarea = $taskID";
            mysqli_query($con,$query);

            $_SESSION['message']='Tarea cargada correctamente';
            $_SESSION['message_type']='warning';
            $_SESSION['rol']='alumno';
            //header("Location: index.php");
        }

        public function downloadTask($taskID)
        {
            $con=$this->conectar->connectDB();
            $query = "SELECT Documento FROM tareas WHERE IDTarea=$taskID LIMIT 1";
            $result = mysqli_query($con,$query);
            $file = mysqli_fetch_object($result);
            //$file
            return $file;
        }
    }
?>