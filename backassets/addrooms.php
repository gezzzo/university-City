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
    if (isset($_POST['id'])) {
        $room = $_POST['id'];

        $errors=[];
        if (empty($room)) {
            $errors[]="The room is required";
        }
        
        if (empty($errors)) {
            AddRooms($room);
            header("LOCATION:rooms.php");

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
        <div class="Form" id="formroom">
            <?php if(isset($errors)): ?>
            <?php foreach($errors as $error) :?>
                <?= $error ?>
            <?php endforeach;?>
            <?php endif; ?>
            <form action="addrooms.php" method="post" class="Form1" >
                <h1>Adding Room</h1>
                <hr>
                <label for="id" class="Lable"><i class="bi bi-file-earmark-person-fill"></i>room</label><i class="i"> *</i>
                <br>
                <input type="text" name="id" placeholder="room number" required class="input" >
                <br>
                <input type="submit" value="ADD" class="Add1" id="idroom">
            </form>
        </div>
        <script src="../frontassets/js/st.js"></script>
    </body>
</html>