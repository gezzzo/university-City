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
    if (isset($_POST['name'])) {
        $username = $_POST['name'];
        $Address = $_POST['Address'];
        $ID = $_POST['ID'];
        $Phone = $_POST['Phone'];
        $Build = $_POST['Build'];
        $pasword = $_POST['password'];



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

        if (empty($Build)) {
            $errors[]="The build is required";
        }
        if (empty($pasword)) {
            $errors[]="The pasword is required";
        }
        
        if (empty($errors)) {
            AddSupervisor($ID,$username,$Address,$Phone,$pasword,$Build);
            header("LOCATION:supervisor.php");

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
            <form action="addsupervisor.php" method="post" class="Form1">
                
                
                <h1>Adding Supervisor</h1>
                <hr>
                <label for="Full Name" class="Lable"><i class="bi bi-file-earmark-person-fill"></i> Full Name</label><i class="i"> *</i>
                <br>
                <input type="text" name="name" placeholder="Supervisor Name" required class="input" >
                <br>
                <label for="Adderss" class="Lable"><i class="bi bi-geo-alt"></i> Address</label><i class="i"> *</i>
                <br>
                <input type="text" name="Address" placeholder="Supervisor Address" required class="input">
                <br>
                <label for="ID" class="Lable"><i class="bi bi-person-bounding-box"></i> National Id </label><i class="i"> *</i>
                <br>
                <input type="text" name="ID" placeholder="Supervisor National Id" required class="input">
                <br>
                <label for="Phone" class="Lable"><i class="bi bi-telephone-plus" ></i>   Phone Number</label><i class="i"> *</i>
                <br>
                <input type="text" name="Phone" placeholder="Supervisor Phone Number" required class="input">
                <br>
                <label for="password" class="Lable"><i class="bi bi-123"></i> password</label><i class="i"> *</i>
                <br>
                <input type="password" name="password" placeholder="Supervisor password" required class="input">
                <br>
                <label for="Build" class="Lable"><i class="bi bi-house-door"></i> Build Number</label><i class="i"> *</i>
                <br>
                <input type="text" name="Build" placeholder="Supervisor Build Number ex: 1 , 2" required class="input">
                <br>
                <input type="submit" value="Insert" class="Add1" id="idSupervisor">
            </form>
        </div>
        <script src="../frontassets/js/st.js"></script>
    </body>
</html>