<?php include ("includes/header.php")?>
<?php require_once ("Controllers/controller.php");

    if(isset($_GET['IDTarea']))
    {
        $search=new CrudController(new Connection);
        $search=$search->getTask($_GET['IDTarea']);
    }

    if(isset($_POST['uploads']))
    {
        $uploads=new FileController(new Connection);
        $uploads->uploadTask($_GET['IDTarea'],$_POST['uploaded_file']);
        header("Location: index.php");
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center display-4">Administrador de Tareas</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="d-grid gap-3">
        <form action="upload_task.php?IDTarea=<?php echo $_GET['IDTarea'];?>" method="POST">
            <div class = "form-group">
                <h5>Nombre de tarea: </h5><?php echo $search[0]?><br><br>
                <h5>Descripción de la tarea: </h5><?php echo $search[1]?><br><br>
                <h5>Fecha de entrega de la tarea: </h5><?php echo $search[2]?><br><br>
                <input type="File" class="btn btn-primary" name = "uploaded_file" value="Subir archivo"><br><br>
                <input type="submit" class="btn btn-success" name = "uploads">
            </div>
        </form>
    </div>

<?php include("includes/footer.php")?>