<?php
    session_start();
    interface DBConnectionInterface
    {
        static public function connectDB();
    }

    class Connection implements DBConnectionInterface
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