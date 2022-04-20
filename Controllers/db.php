<?php
    //session_start();
    interface DBConnectionInterface
    {
        public function connectDB();
    }

    class Connection implements DBConnectionInterface
    {
        public function connectDB()
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