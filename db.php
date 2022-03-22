<?php
/* session_start();
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'bd_admin_tareas'
); */
?>
<?php
    session_start();
    class Connection
    {
        static public function connectDB()
        {
            
            $conn = mysqli_connect(
                'localhost',
                'root',
                '',
                'bd_admin_tareas'
            );
            return $conn;
        }
    }
    
?>