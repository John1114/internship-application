<?php
// This file should be named user_delete.php
session_start();
include('database_inc.php');
$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$logged_in_user = $_SESSION['logged_in_user'];
if ($logged_in_user != TRUE) {
header('location:userLogin.php');
}
$result = mysqli_query($connect,
"SELECT * FROM users WHERE email = '$email';");
while ($row = mysqli_fetch_array($result)) {

if($row['stage'] == "preinterview") {
    header('location:userFirstList.php');
}
if($row['stage'] == "postinterview") {
    header('location:userStepThree.php');
}
if($row['stage'] == "standby") {
    header('location:waiting.php');
} 
}
$id_to_delete = $_GET['id'];
$result2 = mysqli_query($connect,
            "DELETE FROM `opportunities` WHERE `opportunities`.`id` = '$id_to_delete';");
// send user back to users.php
header('location:userFirstList.php');
include('user_footer.php');