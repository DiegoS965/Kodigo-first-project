<?php
    require_once "db.php";
    class LoginSystem
    {
        static public function verifyLogin()
        {
            $_SESSION['usuario'] =  'oscar';
            $usuario = (isset($_SESSION['usuario'] )) ? $_SESSION['usuario'] :'' ;
            $conectar=Connection::connectDB();
            $query = "SELECT * FROM alumnos WHERE Nombre = '$usuario'";
            $result=mysqli_query($conectar,$query);
            $rol = ($result->num_rows > 0) ? 'alumno' : 'invitado';
            if($rol=='invitado')
            {
                $query = "SELECT * FROM profesor_admin WHERE Nombre = '$usuario'";
                $result=mysqli_query($conectar,$query);
                $rol = ($result->num_rows > 0) ? 'profesor' : 'invitado';
            }
            return $rol;
        }
        
    }
?>