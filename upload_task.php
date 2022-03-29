<?php include ("includes/header.php")?>
<?php require_once ("controller.php");

    if(isset($_GET['IDTarea']))
    {
        $search=CrudController::getTask();
    }


    if(isset($_POST['uploads']))
    {
        $uploads=CrudController::uploadTask();
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Administrador de Tareas</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="d-grid gap-3">
        <form action="upload_task.php?IDTarea=<?php echo $_GET['IDTarea'];?>" method="POST">">
            <div class = "form-group">
                <h5>Nombre de tarea: <?php echo $search[0]?><br></h5><br>
                <h5>Descripción de la tarea: <?php echo $search[1]?></h5><br>
                <h5>Fecha de entrega de la tarea: <?php echo $search[2]?></h5><br>
                <input type="File" class="btn btn-primary" name = "uploaded_file" value="Subir archivo"><br><br>
                <input type="submit" class="btn btn-success" name = "uploads">
            </div>
        </form>
    </div>

<?php include("includes/footer.php")?>