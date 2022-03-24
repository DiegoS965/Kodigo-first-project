<?php include("includes/header.php");
require_once "controller.php";?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Task Manager</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="save_task.php" method="post">
                <div class="form-group">
                    <label form="">Titulo de la tarea</label>
                    <input type="text" name="taskName" class="form-control">
                </div>
                <div class="form-group">
                    <label form="">Descripción de la tarea</label>
                    <textarea name="descriptionTask" id="" cols="" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label form="">Fecha de entrega de la tarea</label>"
                    <input type="date" name="duedateTask" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" name="save_task" value="Save Task">
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>
