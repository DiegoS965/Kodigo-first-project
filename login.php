<?php require_once ("includes/header.php")?>
<?php require_once ("Controllers/loginSystem.php")?>
<div class="container d-grid gap-3">
    <div class="text-center"><br>
        <h1 class= " display-4">Por favor iniciar sesión</h1>
        <hr class="height:1px;color: black;background-color:black;"><br><br>
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
            <input type="text" class="form-control w-25 mx-auto" name="email" placeholder="Ingresar correo" autofocus>
            <small id="emailHelp" class="form-text text-muted">Nosotros nunca compartiremos tu correo con alguien más.</small><br><br>
            <input type="password" class="form-control w-25 mx-auto" name="password" placeholder="Ingresar contraseña"><br>
            <input type="submit" name="send_credentials" value="Log in" class="btn btn-primary btn-block">
        </div>
    </form>
</div>
<?php 
    if (isset($_POST['logout_button']))
    {
        $logout=new LoginSystem(new Connection);
        $logout->logOut();
        header("Location: welcomePage.php");
    }
?>
<?php include("includes/footer.php")?>