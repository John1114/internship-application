<?php
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
    header('location:userStepTwo.php');
}
if($row['stage'] == "standby") {
    header('location:waiting.php');
}
}
  function has_dupes($array) {
    $dupe_array = array();
    foreach ($array as $val) {
        if (++$dupe_array[$val] > 1) {
            return true;
        }
    }
    return false;
}

$preferencesarray = array();
$preferences = "";
$preference_number = 1;
$result = mysqli_query($connect,
    "SELECT * FROM interviews WHERE `user_id` = '$user_id';");
while ($row = mysqli_fetch_array($result))
{   
$preference = $_POST[$preference_number];

if ($preference == "incorrect" || $preference == "") {
    $preferences = "";
    $result4 = mysqli_query($connect,
"UPDATE `users` SET `preferences` = '$preferences'  WHERE `id` = '$user_id';");
    $_SESSION['preference_number'] = $preference_number;
    $_SESSION['no_option_chosen'] = TRUE;
    header('location:userStepThree.php');
}

if($preference != "NULL"){
$preferences = $preferences . $preference . "_";
}
$preferencesarray[] = $preference;
if(has_dupes($preferencesarray) == true) {
    ?> <b><?php print_r ( $preferencesarray); ?> </b><?php
    $preferences = "";
    $result5 = mysqli_query($connect,
"UPDATE `users` SET `preferences` = '$preferences'  WHERE `id` = '$user_id';");
    $_SESSION['duplicate_offer_chosen'] = TRUE;
    header('location:userStepThree.php');
}
$preference_number += 1;
}


$preferences = substr($preferences, 0, -1);
echo $preferences;
if ($_SESSION['duplicate_offer_chosen'] == FALSE && $_SESSION['no_option_chosen'] == FALSE) {
    header('location:userStepThreeSubmitted.php');
}
