<?php
    require_once("../Controllers/controller.php");
    include("../includes/header.php");
    if(isset($_GET['IDAlumno']))
    {
        $search=new StudentCrudController(new Connection);
        $search=$search->getStudent($_GET['IDAlumno']);
    }
    
    if(isset($_POST['update']))
    {
        $update=new StudentCrudController(new Connection);
        $updatedStudentData=array($_POST['studentName'],$_POST['updatedEmail'],$_POST['updatedPassword']);
        $update->updateStudent($_GET['IDAlumno'],$updatedStudentData);
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center display-4">Administrador de Asignaciones</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
            <form action="update_student.php?IDAlumno=<?php echo $_GET['IDAlumno'];?>" method="POST">
            <div class="form-group">
                <small id="nameHelp" class="form-text text-muted">Actualice el nuevo nombre del alumno</small>
                <input type="text" name="studentName" value = "<?php echo $search[0];?>" class="form-control"
                placeholder="Actualizar título"><br>
            </div>
            <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Actualice el nuevo Email del alumno</small>
                <textarea name="updatedEmail" id="" rows="3" class="form-control" placeholder="Actualizar Email"><?php echo $search[1]?></textarea><br>
            </div>
            <div class="form-group">
                <small id="passwordHelp" class="form-text text-muted">Actualice la nueva contraseña del alumno</small>
                <textarea name="updatedPassword" id="" rows="3" class="form-control" placeholder="Actualizar contraseña"><?php echo $search[2]?></textarea><br>
            </div>

            <button class="btn btn-success" name="update">Actualizar</button>
        </form>
    </div>
</div>
<?php include("../includes/footer.php")?>
