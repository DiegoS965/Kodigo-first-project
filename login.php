<?php include ("includes/header.php")?>
<?php include ("verifyLogin.php")?>
<div class="container">
    <div class="text-center">
        <h1>Please log in</h1>
    </div>
    <form action="login.php" method="post">
        <div class="text-center">
            <input type="text" class="form-control w-25" name="email" placeholder="Enter your email" autofocus>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <input type="password" class="form-control w-25" name="password" placeholder="Enter your password">
            <input type="submit" name="send_credentials" value="Log in" class="btn btn-primary btn-block">
        </div>
    </form>
</div>
<?php include("includes/footer.php")?>