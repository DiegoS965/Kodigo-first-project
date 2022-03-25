<?php
    require_once "db.php";
    class LoginSystem
    {
        static public function verifyLogin()
        {
            if (isset($_POST['send_credentials']))
            {
                $userData= array($_POST['email'],$_POST['password']);
            }
            $_SESSION['email'] =  $userData[0];
            $_SESSION['password']= $userData[1];
            $usuario = (isset($_SESSION['email'] )) ? $_SESSION['email'] :'' ;
            $usuarioPassword = (isset($_SESSION['password'] )) ? $_SESSION['password'] :'' ;
            $conectar=Connection::connectDB();
            $query = "SELECT * FROM alumnos WHERE Email = '$usuario'";
            $queryPass= "SELECT * FROM alumnos WHERE Contrasenya = '$usuarioPassword'";
            $queryPro = "SELECT * FROM profesor_admin WHERE Email = '$usuario'";
            $queryPassPro= "SELECT * FROM profesor_admin WHERE Contrasenya = '$usuarioPassword'";
            $result=mysqli_query($conectar,$query);
            $resultP=mysqli_query($conectar,$queryPass);
            $resultPro=mysqli_query($conectar,$queryPro);
            $resultPassPro=mysqli_query($conectar,$queryPassPro);
            $R1 = $result->num_rows>0;
            $R2 = $resultP->num_rows>0;
            $R1Pro = $resultPro->num_rows>0;
            $R2Pro = $resultPassPro->num_rows>0;
            if (($R1==$_SESSION['email']) && ($R2==$_SESSION['password']))
            {
                $_SESSION['rol'] = 'alumno';
            }elseif($R1Pro==$_SESSION['email'] && $R2Pro==$_SESSION['password'])
            {
                $_SESSION['rol'] = 'profesor';
            }
            else{
                $_SESSION['rol']='invitado';
                $_SESSION["login_message"]='El correo o contraseña ingresados son incorrectos, por favor intente de nuevo';
                $_SESSION['login_message_type']='danger';
                header("Location: login.php");
            }
            return $_SESSION['rol'];
        }
    }
?>