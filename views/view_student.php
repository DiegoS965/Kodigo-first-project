<?php include ("../includes/header.php")?>
<?php require_once ("../Controllers/controller.php") ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center display-4">Administrador de asignaciones</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-hover bg-light text-dark">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result_tasks=new StudentCrudController(new Connection);
                    $result_tasks=$result_tasks->tableStudent();
                    while($row=mysqli_fetch_array($result_tasks)){?>
                <tr>
                    <td><?php if (strlen($row['Nombre']) > 30)
                        {
                        $row['Nombre'] = substr($row['Nombre'], 0, 27) . '...';
                        }
                        echo $row['Nombre']?></td>
                    <td><?php if (strlen($row['Email']) > 30)
                        {
                        $row['Email'] = substr($row['Email'], 0, 27) . '...';
                        }
                        echo $row['Email']?>
                    </td>
                    
                    <td>
                        <a href="update_student.php?IDAlumno=<?php echo $row['IDAlumno']?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="delete_student.php?IDAlumno=<?php echo $row['IDAlumno']?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <a href="../index.php" class="btn btn-primary" <?php $_SESSION['rol']='profesor'?>>Volver</a>
    </div>
</div>
<?php include("../includes/footer.php")?>