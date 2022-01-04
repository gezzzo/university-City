<?php

session_start();
require_once 'lib.php';

if (empty($_SESSION["user"])) {
    header("LOCATION:https://localhost/universty/index.php");
}

elseif($_SESSION["allow"]!="boss" && $_SESSION["allow"]!="manager" ){

    header("LOCATION:https://localhost/universty/index.php");
}

else {
    DeleteStudent($_GET["id"]);
    header("LOCATION:students.php");
}


?>
