<?php
session_start();
include 'database_inc.php'; 
$organization_name = $_SESSION['organization'];
$organization_id = $_SESSION['logged_in_id'];
$logged_in = $_SESSION['logged_in'];
$user_id = $_GET['id'];
$user_name = $_GET['user_name'];
$offer_id = $_GET['offer_id'];
$offer_name = $_GET['offer_name'];
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
  "SELECT * FROM interviews WHERE `organization_id` = '$organization_id' AND `offer_id` = '$offer_id';");
  while ($row = mysqli_fetch_array($result2)) {
      if ($row['user_id'] == $user_id) {
          $_SESSION['user_already_added'] = TRUE;
          $user_already_added = TRUE;
          header('location:orgStepTwo.php?function=viewlist');
      }
  }
  
  //$_SESSION['user_already_added']
if ($_SESSION['user_already_added'] != TRUE) {
$result3 = mysqli_query($connect,
    "INSERT INTO `interviews` 
    (`id`, `user_id`, `user_name`, `offer_id`, `offer_name`, `organization_id`, `organization_name`) 
    VALUES (NULL, '$user_id', '$user_name', '$offer_id', '$offer_name', '$organization_id', '$organization_name');");
$_SESSION["user_added"] = TRUE;
header('location:orgStepTwo.php?function=viewlist');
}

// $result = mysqli_query($connect,
// "INSERT INTO `offer` 
// (`id`, `organization`, `job_title`, `job_description`, `location`, `start_date`, `end_date`, `job_function`, `required_languages`, `required_computer_skills`, `required_travel`, `number_of_openings`, `additional_notes`) 
// VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);"
// );
?> 