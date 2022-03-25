<?php include ("includes/header.php")?>
<?php require_once ("db.php") ?>
<?php require_once ("loginSystem.php");
 if (isset($_POST['send_credentials']))
{
    $_SESSION['rol'] = LoginSystem::verifyLogin();
} 
//$_SESSION['rol']=="alumno";
if($_SESSION['rol'] == "alumno"){?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Administrador de asignaciones</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="col-md-12">
        <?php if(isset($_SESSION['message'])) {?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php session_unset(); }?>
    </div>
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tarea</th>
                    <th>Descripción</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de entrega</th>
                    <th>Documento</th>
                    <th>Calificado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conectar=Connection::connectDB();
                    $query= "SELECT * FROM tareas";
                    $result_tasks=mysqli_query($conectar,$query);
                    while($row=mysqli_fetch_array($result_tasks)){?>
                <tr>
                    <td><?php echo $row['Titulo']?></td>
                    <td><?php echo $row['Descripcion']?></td>
                    <td><?php echo $row['Fecha_creada']?></td>
                    <td><?php echo $row['Fecha_entrega']?></td>
                    <td><?php echo $row['Documento']?></td>
                    <td><?php echo $row['Calificado']?></td>
                    <td>
                        <a href="index.php" class="btn btn-primary">
                            <i class="fa-solid fa-arrow-up"></i>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php } else if($_SESSION['rol'] == "profesor"){ ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Administrador de asignaciones</h1>
            <hr class="height:1px;color: black;background-color:black;">
        </div>
    </div>
    <div class="col-md-12">
        <?php if(isset($_SESSION['message'])) {?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php session_unset(); }?>
        <a href="create_task.php" class="btn btn-success">Crear una nueva tarea</a>
    </div>
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tarea</th>
                    <th>Descripción</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de entrega</th>
                    <th>Documento</th>
                    <th>Calificado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conectar=Connection::connectDB();
                    $query= "SELECT * FROM tareas";
                    $result_tasks=mysqli_query($conectar,$query);
                    while($row=mysqli_fetch_array($result_tasks)){?>
                <tr>
                    <td><?php echo $row['Titulo']?></td>
                    <td><?php echo $row['Descripcion']?></td>
                    <td><?php echo $row['Fecha_creada']?></td>
                    <td><?php echo $row['Fecha_entrega']?></td>
                    <td><?php echo $row['Documento']?></td>
                    <td><?php echo $row['Calificado']?></td>
                    <td>
                        <a href="update.php?IDTarea=<?php echo $row['IDTarea']?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="delete.php?IDTarea=<?php echo $row['IDTarea']?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php } else { ?>
<div class="container">
    <br />
    <p class="text-center">Solo los usuarios registrados pueden ver esta página. <a href="login.php">Iniciar sesion</a>
    </p>
</div>
<?php } ?>
<?php include("includes/footer.php")?>