<?php


// login boss
function loginaboss($username,$password){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "SELECT * FROM `boss` WHERE `username` = '$username' && `password` = '$password'";

    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;

}

// login manager
function loginmanager($id,$password){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "SELECT * FROM `manager` WHERE `id` = '$id' && `password` = '$password'";
    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;

}

// login supervisor
function loginsupervisor($id,$password){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "SELECT * FROM `supervisor` WHERE `id` = '$id' && `password` = '$password'";
    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;

}


// show all Boss
function allBoss(){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `SelectBoss`()";

    $q = mysqli_query($co,$qu);

    $boss=[];

    while($res = mysqli_fetch_assoc($q)){
        $boss[]=$res;
    }

    return $boss;
}


// show all students
function allstudents(){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `SelectAllStudents`();";

    $q = mysqli_query($co,$qu);

    $students=[];

    while($res = mysqli_fetch_assoc($q)){
        $students[]=$res;
    }

    return $students;
}


// show all students by Id
function allstudentsbyId($id){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `SelectStudentById`('$id');";

    $q = mysqli_query($co,$qu);

    $students=[];

    while($res = mysqli_fetch_assoc($q)){
        $students[]=$res;
    }

    return $students;
}


// show all students
function allGraduatingstudent(){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `SelectGraduatingstudent`();";

    $q = mysqli_query($co,$qu);

    $Graduatingstudents=[];

    while($res = mysqli_fetch_assoc($q)){
        $Graduatingstudents[]=$res;
    }

    return $Graduatingstudents;
}


// show all students by Id
function allGraduatingstudentbyId($id){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `SelectGraduatingbyId`('$id');";

    $q = mysqli_query($co,$qu);

    $Graduatingstudents=[];

    while($res = mysqli_fetch_assoc($q)){
        $Graduatingstudents[]=$res;
    }

    return $Graduatingstudents;
}


// show all Supervisors
function allSupervisor(){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `selectAllSupervisorbybuild`();";

    $q = mysqli_query($co,$qu);

    $Supervisor=[];

    while($res = mysqli_fetch_assoc($q)){
        $Supervisor[]=$res;
    }

    return $Supervisor;
}

// show all Supervisors
function allSupervisorbyId($id){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `selectSupervisorbybuildById`($id);";

    $q = mysqli_query($co,$qu);

    $Supervisor=[];

    while($res = mysqli_fetch_assoc($q)){
        $Supervisor[]=$res;
    }

    return $Supervisor;
}

// show  Managers by id
function managerbyID($id){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `selectSupervisorbybuildById`($id);";

    $q = mysqli_query($co,$qu);

    $Supervisor=[];

    while($res = mysqli_fetch_assoc($q)){
        $Supervisor[]=$res;
    }

    return $Supervisor;
}



// show all managers
function allmanagers(){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `selectmanagerbybuild`();";

    $q = mysqli_query($co,$qu);

    $managers=[];

    while($res = mysqli_fetch_assoc($q)){
        $managers[]=$res;
    }

    return $managers;
}


// show all Rooms
function allRooms(){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `SelectAllRoom`();";

    $q = mysqli_query($co,$qu);

    $Rooms=[];

    while($res = mysqli_fetch_assoc($q)){
        $Rooms[]=$res;
    }

    return $Rooms;
}

// show all builds
function allbuilds(){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `SelectAllBuild`();";

    $q = mysqli_query($co,$qu);

    $builds=[];

    while($res = mysqli_fetch_assoc($q)){
        $builds[]=$res;
    }

    return $builds;
}


// show  Managers by id
function onemanagerbyID($id){

    $co = mysqli_connect("localhost","root","","srudents");

    // $qu = "CALL `onemanagerbyID`($id);";
    $qu = "SELECT * FROM `manager` WHERE `id` = '$id'";


    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;
}


// show  supervisor by id
function onesupervisorbyID($id){

    $co = mysqli_connect("localhost","root","","srudents");

    // $qu = "CALL `onesupervisorbyID`($id);";
    $qu = "SELECT * FROM `supervisor` WHERE `id` = '$id'";


    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;
}

// show  Managers by id
function onestudentbyID($id){

    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "SELECT * FROM `student` WHERE `id` = '$id'";

    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;
}


// show  Boss by id
function onebossbyID($id){

    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "SELECT * FROM `boss` WHERE `id` = '$id'";

    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;
}

// Add boss
function AddBoss($username,$password){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `InsertBoss`('$username', '$password');";
    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}


// Add Builds
function AddBuilds($name){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `InsertBuild`('$name');";
    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}

// Add Rooms
function AddRooms($id){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `InsertRoom`('$id');";
    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}



// Add Students
function AddStudents($id,$name,$address,$phone,$faculty,$Level,$build_id,$room_id){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `InsertStudent`('$id','$name','$address','$phone','$faculty','$Level','$build_id','$room_id');";

    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}



// Add Supervisors
function AddSupervisor($id,$name,$address,$phone,$password,$build_id){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `InsertSupervisor`('$id','$name','$address','$phone','$password','$build_id');";

    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}



// Add managers
function Addmanager($id,$name,$address,$phone,$password,$build_id,$boss_id){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "CALL `InsertManager`('$id','$name','$address','$phone','$password','$build_id','$boss_id');";

    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}

// Update Manager
function UpdateManager($id,$address,$phone,$PASSWD){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "UPDATE `manager` SET `address`='$address',`phone`='$phone',`password`='$PASSWD' WHERE `id` = '$id ';";

    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}

// Update Supervisor
function UpdateSupervisor($id,$address,$phone,$PASSWD){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "UPDATE `supervisor` SET `address`='$address',`phone`='$phone',`password`='$PASSWD' WHERE `id` = $id ;";

    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}


// Update Student
function UpdateStudent($id,$address,$phone,$level){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "UPDATE `student` SET `address`='$address',`phone`='$phone',`level`='$level' WHERE `id` = $id ;";

    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}



// Update Boss

function UpdateBoss($id,$username,$password){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "UPDATE `boss` SET `username`='$username',`password`='$password' WHERE `id` = $id ;";

    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}

// Delete Student

function DeleteStudent($id){
    $co = mysqli_connect("localhost","root","","srudents");

    $qu = "DELETE FROM `student` WHERE `id`='$id'";

    mysqli_query($co,$qu);


    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}
