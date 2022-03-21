<?php include("includes/header.php")?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Administrador de Tareas</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
            <form action="update.php" method="POST">
            <div class="form-group">
                <input type="text" name="taskName" class="form-control" placeholder="Update taskName">
            </div>
            <div class="form-group">
                <textarea name="descriptionTask" id="" cols="" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="date" name="dateTask" class="form-control">
            </div>
            <div class="form-group">
                <input type="date" name="duedateTask" class="form-control">
            </div>
            <button class="btn btn-success" name="update">Update</button>
        </form>
    </div>
</div>
<?php include("includes/footer.php")?>