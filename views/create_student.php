<?php 
    include("../includes/header.php");
    require_once "../Controllers/controller.php";
    if(isset($_POST['save_student']))
    {
        $save=new StudentCrudController(new Connection);
        $newData= array($_POST['studentName'],$_POST['studentEmail'],$_POST['studentPassword']);
        $save->saveStudent($newData);
        header("Location: ../index.php");
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center display-4">Administrador de asignaciones</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="create_student.php" method="post">
                <div class="form-group">
                    <small id="nameHelp" class="form-text text-muted">Nombre del alumno</small>
                    <input type="text" name="studentName" class="form-control"><br>
                </div>
                <div class="form-group">
                    <small id="emailHelp" class="form-text text-muted">Email del alumno</small>
                    <textarea name="studentEmail" id="" cols="" rows="3" class="form-control"></textarea><br>
                </div>
                <div class="form-group">
                    <small id="passwordHelp" class="form-text text-muted">Contraseña del alumno</small>
                    <input type="text" name="studentPassword" class="form-control"><br>
                </div>
                
                <input type="submit" class="btn btn-primary" name="save_student" value="Crear cuenta de alumno">
            </form>
        </div>
    </div>
    <a href="../index.php" class="btn btn-primary" <?php $_SESSION['rol']='profesor'?>>Volver</a>
</div>
<?php include("../includes/footer.php")?>