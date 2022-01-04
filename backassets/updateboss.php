<?php

session_start();
require_once "lib.php";

if (empty($_SESSION["user"])) {
    header("LOCATION:https://localhost/universty/index.php");
}

elseif($_SESSION["allow"]!="boss"){

    header("LOCATION:https://localhost/universty/index.php");
}

else{
    if (isset($_POST['username'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $errors=[];
        if (empty($username)) {
            $errors[]="The username is required";
        }
        if (empty($password)) {
            $errors[]="The password is required";
        }

        if (empty($errors)) {
            UpdateBoss($id,$username,$password);
            header("LOCATION:boss.php");

        }
    }
}

$res= onebossbyID($_GET["id"]);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Adding</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../frontassets/css/student.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
        <div class="Form">
            <?php if(isset($errors)): ?>
            <?php foreach($errors as $error) :?>
                <?= $error ?>
            <?php endforeach;?>
            <?php endif; ?>
            <form action="updateboss.php" method="post" class="Form1">
                
                <h1>Update Boss</h1>
                <hr>
                <br>
                <label for="username" class="Lable"><i class="bi bi-username"></i> username</label><i class="i"> *</i>
                <br>
                <input type="text" name="username" placeholder="Boss username" required class="input" value="<?= $res["username"] ?>">
                <br>
                <label for="password" class="Lable"><i class="bi bi-password" ></i>password</label><i class="i"> *</i>
                <br>
                <input type="text" name="password" placeholder="Student password" required class="input" value="<?= $res["password"] ?>">
                <br>
                <input type="hidden" name="id" value="<?=$_GET["id"] ?>">
                <input type="submit" value="Update" class="Add1" id="idd1">
            </form>
        </div>
        <script src="../frontassets/js/st.js"></script>
    </body>
</html>