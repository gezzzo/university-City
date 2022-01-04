<?php
session_start();
require_once "lib.php";

if (empty($_SESSION["user"]) || $_SESSION["allow"]!="boss") {
    header("LOCATION:https://localhost/universty/index.php");
}
else{
    $managers =allmanagers();
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../frontassets/css/home.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
        <ul>
        <?php if($_SESSION["allow"]=="boss"): ?>
            <li><a class="active" href="boss.php"><i class="bi bi-house" style="font-size: 30px;"></i></a></li>
            <li><a class="active" href="graduationstudent.php"><i class="bi bi-mortarboard" style="font-size: 30px;"></i></a></li>
            <li><a class="active" href="managers.php"><i class="bi bi-person-plus" style="font-size: 30px;"></i></a></li>
            <li><a class="active" href="rooms.php"><i class="bi bi-archive" style="font-size: 30px;"></i></a></li>
            <?php endif; ?>
            <?php if($_SESSION["allow"]=="manager" || $_SESSION["allow"]=="boss"  ):  ?>
            <li><a class="active" href="supervisor.php"><i class="bi bi-person-video3" style="font-size: 30px;"></i></a></li>
            <?php endif;  ?>
            <?php if($_SESSION["allow"]=="supervisor" || $_SESSION["allow"]=="boss" || $_SESSION["allow"]=="manager"  ):  ?>
                <li><a class="active" href="students.php"><i class="bi bi-person-circle" style="font-size: 30px;"></i></a></li>
            <?php endif;  ?>
            
            <li style="float:right"><a href="logout.php"><i class="bi bi-box-arrow-right" style="font-size: 30px;"></i></a></li>
            
        </ul>
        <div>
            <table class="table3">
                <h1 style="text-align: center;">Managers informations</h1>
                <tr class="tr3">
                <th><i class="bi bi-123"></i> N</th>
                <th><i class="bi bi-person-square"></i> Full Name</th>
                <th><i class="bi bi-geo-alt"></i> Address</th>
                <th><i class="bi bi-telephone"></i> Phone Number</th>
                <th><i class="bi bi-house"></i> Build Name</th>
                <th><i class="bi bi-by"></i>By</th>
                <th><i class="bi bi-update"></i>update</th>
            </tr>
            <?php foreach($managers as $manager): ?>
            <tr>
                <th><?=$manager["id"]?></th>
                <th><?=$manager["name"]?></th>
                <th><?=$manager["address"]?></th>
                <th><?=$manager["phone"]?></th>
                <th><?=$manager["build_name"]?></th>
                <th><?=$manager["byadmin"]?></th>
                <th><a href="updatemanagers.php?id=<?= $manager["id"] ?>" style="font:30px; text-direction: none">update</a></th>
            </tr>
            <?php endforeach; ?>
            </table>
            <br>
            <br>
            <a href="addmanagers.php" class="btn btn-primary"><input type="button" value="ADD" ></a>

            
        </div>
    </body>
</html>