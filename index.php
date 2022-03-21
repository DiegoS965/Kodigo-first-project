<?php include ("includes/header.php")?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">Task Manager</h1>
                <hr class="height:1px;color: black;background-color:black;">
            </div>
        </div>
        <div class="col-md-12">
            <a href="create_task.php" class="btn btn-success">Create New Task</a>
            
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Actions</th>
                    <th>TaskName</th>
                    <th>DescriptionTask</th>
                    <th>DateTask</th>
                    <th>DueDateTask</th>
                </tr>
            </thead>
            <tbody>
                <td>
                    <a href="update.php" class="btn btn-secondary">
                        <i class="fas fa-marker"></i>
                    </a>
                    <a href="delete.php" class="btn btn-danger">
                        <i class="far fa-trash-alt"></i>
                    </a>
                    
                </td>
            </tbody>
        </table>
    </div>
</div>
<?php include("includes/footer.php")?>