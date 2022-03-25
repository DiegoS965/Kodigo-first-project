<?php include ("includes/header.php")?>
<?php include ("loginSystem.php")?>
<div class="container">
    <div class="text-center">
        <h1>Por favor iniciar sesión</h1>
        <?php if(isset($_SESSION['login_message'])) {?>
        <div class="alert alert-<?= $_SESSION['login_message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['login_message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php session_unset(); }?>
    </div>
    <form action="index.php" method="post">
        <div class="text-center">
            <input type="text" class="form-control w-25" name="email" placeholder="Enter your email" autofocus>
            <small id="emailHelp" class="form-text text-muted">Nosotros nunca compartiremos tu correo con alguien más.</small>
            <input type="password" class="form-control w-25" name="password" placeholder="Enter your password">
            <input type="submit" name="send_credentials" value="Log in" class="btn btn-primary btn-block">
        </div>
    </form>
</div>
<?php
    /* if (isset($_POST['send_credentials']))
    {
        $checkdata=LoginSystem::verifyLogin();
         if ($checkdata=='alumno' || $checkdata=='profesor')
        {
            header("Location: index.php");
        } 
    } */
?>
<?php include("includes/footer.php")?>