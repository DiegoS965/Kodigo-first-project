<?php ?> <!--incluir base de dato-->
<?php include("includes/header.php")?>
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
                        <label form="">Task_Name</label>
                        <input type="text" name="taskName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label form="">Description_Task</label>
                        <textarea name="descriptionTask" id="" cols="" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label form="">Date_Task</label>"
                        <input type="date" name="dateTask" class="form-control">
                    </div>
                    <div class="form-group">
                        <label form="">Due_Date_Task</label>"
                        <input type="date" name="duedateTask" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary" name="save_task" value="Save Task">
                </form>
            </div>
        </div>
</div>
<?php include("includes/footer.php")?>
