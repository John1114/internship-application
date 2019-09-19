<?php
session_start();
// this file should be named login_process.php
$organization_name = $_POST['organization_name'];
$password = $_POST['password'];
$logged_in = $_SESSION['logged_in'];
if($logged_in == TRUE) {
    $logged_in = FALSE;
    $_SESSION['logged_in'] = $logged_in;
    header('location:logout.php');
}
include('database_inc.php');
// This sort of query is very unsafe. 
$result = mysqli_query($connect,
    "SELECT * FROM organizations WHERE organization_name = '$organization_name';");
if (mysqli_num_rows($result) == 0) {
    $_SESSION['message_login_problem'] = TRUE;
    header('location:orgLogin.php');
}
    while ($row = mysqli_fetch_array($result)) {
        if ($row['password'] == $password)
    {
        $logged_in_id = $row['id'];
        $_SESSION['logged_in_id'] = $logged_in_id;
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['organization'] = $organization_name;
        
        if($row['stage'] == "signup") {
            header('location:orgStepOneDisplayOffers.php');
        }
        if($row['stage'] == "preinterview") {
            header('location:orgStepTwo.php');
        }
        if($row['stage'] == "postinterview") {
            header('location:orgStepThree.php');
        }
        if($row['stage'] == "standby") {
            header('location:waiting.php');
        }

    } else {
        $_SESSION['message_login_problem'] = TRUE;
        header('location:orgLogin.php');
    }
}
?>