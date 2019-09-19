<?php
// This file should be named user_delete.php
session_start();
$organization = $_SESSION['organization'];
$organization_id = $_SESSION['logged_in_id'];
$logged_in = $_SESSION['logged_in'];
if ($logged_in != TRUE) {
  header('location:orgLogin.php');
}
include('database_inc.php');
$result = mysqli_query($connect,
    "SELECT * FROM organizations WHERE organization_name = '$organization';");
    while ($row = mysqli_fetch_array($result)) {

    if($row['stage'] == "preinterview") {
        header('location:orgStepTwo.php');
    }
    if($row['stage'] == "postinterview") {
        header('location:orgStepThree.php');
    }
  }
$id_to_delete = $_GET['id'];
$result2 = mysqli_query($connect,
            "DELETE FROM `offers` WHERE `id` = '$id_to_delete';");
// send user back to users.php
        header('location:orgStepOneDisplayOffers.php'); 