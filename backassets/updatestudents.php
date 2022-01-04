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
    if (isset($_POST['Address'])) {
        $Address = $_POST['Address'];
        $id = $_POST['id'];
        $Phone = $_POST['Phone'];
        $level = $_POST['level'];

        $errors=[];
        if (empty($Address)) {
            $errors[]="The Adderss is required";
        }
        if (empty($Phone)) {
            $errors[]="The Phone is required";
        }
        if (empty($level)) {
            $errors[]="The level is required";
        }
        if (empty($errors)) {
            UpdateStudent($id,$Address,$Phone,$level);
            header("LOCATION:students.php");

        }
    }
}

$res= onestudentbyID($_GET["id"]);

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
            <form action="updatestudents.php" method="post" class="Form1">
                
                <h1>Update Students</h1>
                <hr>
                <br>
                <label for="Adderss" class="Lable"><i class="bi bi-geo-alt"></i> Address</label><i class="i"> *</i>
                <br>
                <input type="text" name="Address" placeholder="Student Address" required class="input" value="<?= $res["address"] ?>">
                <br>
                <label for="Phone" class="Lable"><i class="bi bi-telephone-plus" ></i> Phone Number</label><i class="i"> *</i>
                <br>
                <input type="text" name="Phone" placeholder="Student Phone Number" required class="input" value="<?= $res["phone"] ?>">
                <br>
                <label for="level" class="Lable"><i class="bi bi-123"></i>level</label><i class="i"> *</i>
                <br>
                <input type="level" name="level" placeholder="Student level" required class="input" value="<?= $res["level"] ?>">
                <br>
                <input type="hidden" name="id" value="<?=$_GET["id"] ?>">
                <input type="submit" value="Update" class="Add1" id="idd1">
            </form>
        </div>
        <script src="../frontassets/js/st.js"></script>
    </body>
</html>