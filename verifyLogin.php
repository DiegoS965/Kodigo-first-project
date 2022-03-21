<?php
    include("db.php");
    if(isset($_POST['send_credentials']))
    {
        //$title = $_POST['title'];
        //$description=$_POST['description'];
        //$query = "INSERT INTO task(title,description) VALUES ('$title', '$description')";
        //$result=mysqli_query($conn,$query);
        //if(!$result)
        //{
           // die("Query Failed");
       // }
        //$_SESSION["message"]='Task saved succesfully';
        //$_SESSION['message_type']='success';
        header("Location: index.php");
    }
?>