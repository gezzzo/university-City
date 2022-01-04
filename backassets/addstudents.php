<?php

session_start();
require_once "lib.php";

if (empty($_SESSION["user"])) {
    header("LOCATION:https://localhost/universty/index.php");
}

elseif($_SESSION["allow"]!="boss" && $_SESSION["allow"]!="manager" ){

    header("LOCATION:https://localhost/universty/index.php");
}


else{
    if (isset($_POST['name'])) {
        $username = $_POST['name'];
        $Address = $_POST['Address'];
        $ID = $_POST['ID'];
        $Phone = $_POST['Phone'];
        $Level = $_POST['Level'];
        $Faculty = $_POST['Faculty'];
        $Build = $_POST['Build'];
        $Room = $_POST['Room'];



        $errors=[];
        if (empty($username)) {
            $errors[]="The Name is required";
        }
        if (empty($Address)) {
            $errors[]="The Adderss is required";
        }
        if (empty($ID)) {
            $errors[]="The ID is required";
        }
        if (empty($Phone)) {
            $errors[]="The Phone is required";
        }

        if (empty($Faculty)) {
            $errors[]="The Faculty is required";
        }
        if (empty($Level)) {
            $errors[]="The Level is required";
        }
        if (empty($Build)) {
            $errors[]="The build is required";
        }
        if (empty($Room)) {
            $errors[]="The Room is required";
        }
        


        if (empty($errors)) {
            AddStudents($ID,$username,$Address,$Phone,$Faculty,$Level,$Build,$Room);
            header("LOCATION:students.php");

        }
    }
}

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
            <form action="addstudents.php" method="post" class="Form1">
                
                
                <h1>Adding Students</h1>
                <hr>
                <label for="Full Name" class="Lable"><i class="bi bi-file-earmark-person-fill"></i> Full Name</label><i class="i"> *</i>
                <br>
                <input type="text" name="name" placeholder="Student Name" required class="input" >
                <br>
                <label for="Adderss" class="Lable"><i class="bi bi-geo-alt"></i> Address</label><i class="i"> *</i>
                <br>
                <input type="text" name="Address" placeholder="Student Address" required class="input">
                <br>
                <label for="ID" class="Lable"><i class="bi bi-person-bounding-box"></i> National Id </label><i class="i"> *</i>
                <br>
                <input type="text" name="ID" placeholder="Student National Id" required class="input">
                <br>
                <label for="Phone" class="Lable"><i class="bi bi-telephone-plus" ></i>   Phone Number</label><i class="i"> *</i>
                <br>
                <input type="text" name="Phone" placeholder="Student Phone Number" required class="input">
                <br>
                <label for="Faculty" class="Lable"><i class="bi bi-bank"></i> Faculty</label><i class="i"> *</i>
                <br>
                <input type="text" name="Faculty" placeholder="Student Faculty" required class="input">
                <br>
                <label for="Level" class="Lable"><i class="bi bi-123"></i> Level</label><i class="i"> *</i>
                <br>
                <input type="number" name="Level" placeholder="Student Level" required class="input">
                <br>
                <label for="Build" class="Lable"><i class="bi bi-house-door"></i> Build Number</label><i class="i"> *</i>
                <br>
                <input type="text" name="Build" placeholder="Build Number ex: 1 , 2" required class="input">
                <br>
                <label for="Room" class="Lable"><i class="bi bi-list-ol"></i> Room Number</label><i class="i"> *</i>
                <br>
                <input type="text" name="Room" placeholder="Room Number ex: 1 , 2" required class="input">
                <br>
                <input type="submit" value="ADD" class="Add1" id="idstudint">
            </form>
        </div>
        <script src="../frontassets/js/st.js"></script>
    </body>
</html>