<?php
    require_once "db.php";
    interface LoginSystemInterface
    {
        public function verifyLogin($email,$password);
        public function logOut();
    }

    class LoginSystem implements LoginSystemInterface
    {
        private $conectar;
        
        public function __construct(DBConnectionInterface $conectar)
        {
            $this->conectar= $conectar;
        }

        public function verifyLogin($email,$password)
        {
            $con=$this->conectar->connectDB();

            $query = "SELECT * FROM alumnos WHERE Email = '$email'";
            $queryPro = "SELECT * FROM profesor_admin WHERE Email = '$email'";
            
            $result=mysqli_query($con,$query);
            $resultPro=mysqli_query($con,$queryPro);
            
            $R1 = mysqli_fetch_array($result);
            $R1Pro = mysqli_fetch_array($resultPro);

            $R1['Email'] = (isset($R1['Email'])) ? $R1['Email'] : 'None';
            $R1['Contrasenya'] = (isset($R1['Contrasenya'])) ? $R1['Contrasenya'] : 'None';
            $R1Pro['Email'] = (isset($R1Pro['Email'])) ? $R1Pro['Email'] : 'None';
            $R1Pro['Contrasenya'] = (isset($R1Pro['Contrasenya'])) ? $R1Pro['Contrasenya'] : 'None';

            if (($R1['Email']==$email) && ($R1['Contrasenya']==$password))
            {
                $_SESSION['rol'] = 'alumno';
            }
            elseif($R1Pro['Email']==$email && $R1Pro['Contrasenya']==$password)
            {
                $_SESSION['rol'] = 'profesor';
            }
            else
            {
                $_SESSION['rol']='invitado';
                $_SESSION["login_message"]='El correo o contraseña ingresados son incorrectos, por favor intente de nuevo';
                $_SESSION['login_message_type']='danger';
                header("Location: login.php");
            }
            
            return $_SESSION['rol'];
        }

        public function logOut()
        {
            $_SESSION['rol']='invitado';
            return $_SESSION['rol'];
        }
    }
?>