<?php include("includes/header.php");
require_once "controller.php";?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center display-4">Administrador de asignaciones</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="save_task.php" method="post">
                <div class="form-group">
                    <small id="titleHelp" class="form-text text-muted">Titulo de la asignación</small>
                    <input type="text" name="taskName" class="form-control"><br>
                </div>
                <div class="form-group">
                    <small id="descriptionHelp" class="form-text text-muted">Descripción de la asignación</small>
                    <textarea name="descriptionTask" id="" cols="" rows="3" class="form-control"></textarea><br>
                </div>
                <div class="form-group">
                    <small id="dateHelp" class="form-text text-muted">Fecha de entrega de la tarea</small>
                    <input type="date" name="duedateTask" class="form-control"><br>
                </div>
                <div class="form-group">
                    <small id="timeHelp" class="form-text text-muted">Hora de entrega de la tarea</small>
                    <input type="time" name="duetimeTask" class="form-control"><br>
                </div>
                <input type="submit" class="btn btn-primary" name="save_task" value="Save Task">
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>
