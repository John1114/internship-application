<?php
session_start();
// this file should be named login_process.php
$email = $_POST['email'];
$password = $_POST['password'];
$logged_in_user = $_SESSION['logged_in_user'];
if($logged_in_user == TRUE) {
    $logged_in_user = FALSE;
    $_SESSION['logged_in_user'] = $logged_in_user;
    header('location:logout_user.php');
}
include('database_inc.php');
// This sort of query is very unsafe. 
$result = mysqli_query($connect,
    "SELECT * FROM users WHERE email = '$email';");
if (mysqli_num_rows($result) == 0) {
    $_SESSION['message_login_problem'] = TRUE;
    header('location:userLogin.php');
}
    while ($row = mysqli_fetch_array($result)) {
        if ($row['password'] == $password)
    {
        $user_id = $row['id'];
        $name = $row['first_name'];
        $email = $row['email'];
        $_SESSION['user_id'] = $user_id;
        $_SESSION['logged_in_user'] = TRUE;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        
        if($row['stage'] == "preinterview") {
            header('location:userFirstList.php');
        }
        if($row['stage'] == "postinterview") {
            header('location:userStepThree.php');
        }
        if($row['stage'] == "standby") {
            header('location:waiting.php');
        }

    } else {
        $_SESSION['message_login_problem'] = TRUE;
        header('location:userLogin.php');
    }
}

?>