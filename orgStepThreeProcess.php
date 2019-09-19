<?php
session_start();
include 'database_inc.php'; 
$organization_name = $_SESSION['organization'];
$organization_id = $_SESSION['logged_in_id'];
$logged_in = $_SESSION['logged_in'];
if ($logged_in != TRUE) {
  header('location:orgLogin.php');
}
$resultt = mysqli_query($connect,
    "SELECT * FROM organizations WHERE organization_name = '$organization';");
    while ($row = mysqli_fetch_array($resultt)) {

    if($row['stage'] == "signup") {
        header('location:orgStepOneDisplayOffers.php');
    }
    if($row['stage'] == "preinterview") {
        header('location:orgStepTwo.php');
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
$result = mysqli_query($connect,
  "SELECT * FROM offers WHERE `organization` = '$organization_name';");
while ($row = mysqli_fetch_array($result))
{ $preference_number = 1;
  $offer_id = $row['id'];

$job_title = $row['job_title'];
$result2 = mysqli_query($connect,
    "SELECT * FROM interviews WHERE `organization_name` = '$organization_name' AND `offer_name` = '$job_title';");
while ($row = mysqli_fetch_array($result2))
{ 


$preference = $offer_id . "_" . $preference_number;
$postpreference = $_POST[$offer_id . "_" . $preference_number];
echo $preference . " = " . $postpreference . nl2br("\n");

if ($postpreference == "incorrect" || $postpreference == "") {
    $preferences = "";
    $result4 = mysqli_query($connect,
"UPDATE `offers` SET `preferences` = '$preferences'  WHERE `organization` = '$organization_name';");
$preferences = "";
    $_SESSION['preference_number'] = $preference_number;
    $_SESSION['offer_name'] = $job_title;
    $_SESSION['no_option_chosen'] = TRUE;
    header('location:orgStepThree.php');
}

if ($postpreference != "NULL") {
$preferences = $preferences . $postpreference . "_";
}
$preference_number += 1;
$preferencesarray[] = $postpreference;
}

if(has_dupes($preferencesarray) == true && sizeof($preferencesarray) >= 2) {
    ?> <b><?php print_r ( $preferencesarray); ?> </b><?php
    $preferences = "";
    $result4 = mysqli_query($connect,
"UPDATE `offers` SET `preferences` = '$preferences'  WHERE `organization` = '$organization_name';");
$preferences = "";
    $_SESSION['job_title'] = $job_title;
    $_SESSION['duplicate_name_chosen'] = TRUE;
    header('location:orgStepThree.php');
}
$preferencesarray = [];
$preferences = substr($preferences, 0, -1);
$result3 = mysqli_query($connect,
"UPDATE `offers` SET `preferences` = '$preferences'  WHERE `id` = '$offer_id';");
$preferences = "";
}
if($_SESSION['duplicate_name_chosen'] == false && $_SESSION['no_option_chosen'] == false){
header('location:orgStepThreeSubmitted.php');
}
include('user_footer.php');
