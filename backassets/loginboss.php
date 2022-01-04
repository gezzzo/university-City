<?php
session_start();
require_once('lib.php');

if (isset($_POST["username"])) {
    $email = $_POST["username"];
    $password = $_POST["password"];
    $errors = [];
    if (empty($_POST["username"])){
        $errors[]="The username is required";
    }
    if (empty($_POST["password"])){
        $errors[]="The password is required";
    }

    if (empty($errors)){
        $res = loginaboss($email,$password);
        if (!empty($res)) {
            $_SESSION['user'] = $res;
            $_SESSION["allow"]="boss";
            header("LOCATION:boss.php");
        }
        else{
            $errors[] = "username or password is incorrect";
        }
    }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../frontassets/css/css.css">
    <title>Login Page</title>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
        <div class="main">
        <?php if(isset($errors)): ?>
            <?php foreach($errors as $error) :?>
            <h3 style="color:white">- <?= $error ?></h3> 
            <?php endforeach;?>
            <?php endif; ?>
            <div class="login">
                <h1 style=" color: #FFC312;">Sign in</h1>
                <form action="loginboss.php" method="post">
                    <i class="fas fa-user" id="i1"></i>
                    <input type="text" placeholder="Username" id="user" name="username" required>
                <br>

                <i class="fas fa-key" id="i2"></i>
                <input type="password" placeholder="password" id="pass" name="password" required>
                <br>
                <br>
                <input type="submit" value="Login" id="sub">
                </form>
            </div>
        </div> 
        <script src="../frontassets/js/js.js"></script>
    </body>
</html>