<?php
    require_once("db.php");
    require_once("controller.php");
    if(isset($_GET['IDTarea']))
    {
        $search=CrudController::getTask();
    }
    
    
    if(isset($_POST['update']))
    {
        $update=CrudController::updateTask();
    }
    include("includes/header.php")
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Administrador de Tareas</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
            <form action="update.php?IDTarea=<?php echo $_GET['IDTarea'];?>" method="POST">
            <div class="form-group">
                <input type="text" name="taskName" value = "<?php echo $search[0];?>" class="form-control"
                placeholder="Actualizar título">
            </div>
            <div class="form-group">
                <textarea name="descriptionTask" id="" rows="3" class="form-control" placeholder="Actualizar descripción"><?php echo $search[1];?>
                </textarea>
            </div>
            <small id="dateHelp" class="form-text text-muted">Actualice la nueva fecha de entrega.</small>
            <?php 
                $oldDueDate = date_create($search[2]);
                $oldDueDate = date_format($oldDueDate,"Y-m-d");
                $oldDueDate = strval($oldDueDate);
                echo $oldDueDate;
            ?>
            <div class="form-group">
                <input type="date" name="duedateTask" value="<?php $oldDueDate?>" class="form-control">
            </div>
            <small id="dateHelp" class="form-text text-muted">¿Ha sido entregada la tarea?</small>
            <div class="form-group">
                <input type="checkbox" name="check" value="1">
            </div>

            <button class="btn btn-success" name="update">Actualizar</button>
        </form>
    </div>
</div>
<?php include("includes/footer.php")?>
