<?php
    require_once("db.php");
    require_once("controller.php");
    if(isset($_GET['IDTarea']))
    {
        $search=new CrudController(new Connection);
        $search=$search->getTask();
    }
    
    
    if(isset($_POST['update']))
    {
        $update=new CrudController(new Connection);
        $update->updateTask();
    }
    include("includes/header.php")
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
            <form action="update.php?IDTarea=<?php echo $_GET['IDTarea'];?>" method="POST">
            <div class="form-group">
                <small id="titleHelp" class="form-text text-muted">Actualice el nuevo titulo de la asignación</small>
                <input type="text" name="taskName" value = "<?php echo $search[0];?>" class="form-control"
                placeholder="Actualizar título"><br>
            </div>
            <div class="form-group">
                <small id="descriptionHelp" class="form-text text-muted">Actualice la nueva descripción de la asignación</small>
                <textarea name="descriptionTask" id="" rows="3" class="form-control" placeholder="Actualizar descripción"><?php echo $search[1]?></textarea><br>
            </div>
            <small id="dateHelp" class="form-text text-muted">Actualice la nueva fecha de entrega.</small>
            <?php 
                $oldDueDate = date_create($search[2]);
                $oldDueDate = date_format($oldDueDate,"Y-m-d");
                $oldDueDate = strval($oldDueDate);
                $oldDueTime = explode(" ",$search[2]);
                $oldDueTime = $oldDueTime[1];
            ?>
            <div class="form-group">
                <input type="date" name="duedateTask" value="<?php echo $oldDueDate?>" class="form-control"><br>
            </div>
            <div class="form-group">
                <small id="timeHelp" class="form-text text-muted">Actualice la nueva hora de entrega</small>
                <input type="time" name="duetimeTask" class="form-control" value="<?php echo $oldDueTime?>"><br>
            </div>
            <small id="dateHelp" class="form-text text-muted">¿Ha sido entregada la tarea?</small>
            <div class="form-group">
                <input type="checkbox" name="check" value="1"><br><br>
            </div>

            <button class="btn btn-success" name="update">Actualizar</button>
        </form>
    </div>
</div>
<?php include("includes/footer.php")?>
