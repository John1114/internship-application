<?php
session_start();
include 'database_inc.php'; 
$organization_name = $_SESSION['organization'];
$organization_id = $_SESSION['logged_in_id'];
$logged_in = $_SESSION['logged_in'];
$user_id = $_GET['user_id'];
$offer_id = $_GET['offer_id'];
if ($logged_in != TRUE) {
  header('location:orgLogin.php');
}
$result = mysqli_query($connect,
    "SELECT * FROM organizations WHERE organization_name = '$organization';");
    while ($row = mysqli_fetch_array($result)) {

    if($row['stage'] == "signup") {
        header('location:orgStepOneDisplayOffers.php');
    }
    if($row['stage'] == "postinterview") {
        header('location:orgStepThree.php');
    }
  }

  $result2 = mysqli_query($connect,
  "DELETE FROM `interviews` WHERE `user_id` = '$user_id' AND `offer_id` = '$offer_id';");
// send user back to users.php
$_SESSION['user_removed'] = TRUE;
header('location:orgStepTwo.php?function=viewlist');