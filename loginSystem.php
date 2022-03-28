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
            $_SESSION['rol']='invitado';

            $_SESSION['email'] =  $userData[0];
            $_SESSION['password']= $userData[1];
            $usuario = (isset($_SESSION['email'] )) ? $_SESSION['email'] :'' ;
            $conectar=Connection::connectDB();

            $query = "SELECT * FROM alumnos WHERE Email = '$usuario'";
            $queryPro = "SELECT * FROM profesor_admin WHERE Email = '$usuario'";
            
            $result=mysqli_query($conectar,$query);
            $resultPro=mysqli_query($conectar,$queryPro);
            
            $R1 = mysqli_fetch_array($result);
            $R1Pro = mysqli_fetch_array($resultPro);

            if ($R1==NULL)
            {
                $R1['Email']='None';
                $R1['Contrasenya']='None';
            }
            if ($R1Pro==NULL)
            {
                $R1Pro['Email']='None';
                $R1Pro['Contrasenya']='None';
            }

            if (($R1['Email']==$_SESSION['email']) && ($R1['Contrasenya']==$_SESSION['password']))
            {
                $_SESSION['rol'] = 'alumno';
            }
            elseif($R1Pro['Email']==$_SESSION['email'] && $R1Pro['Contrasenya']==$_SESSION['password'])
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

        static function logOut()
        {
            $_SESSION['rol']='invitado';
            header("Location: login.php");
        }
    }
?>