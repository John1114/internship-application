<?php
session_start();
$id_to_edit = $_GET['id'];
include('database_inc.php');
$organization = $_SESSION['organization'];
$organization_id = $_SESSION['logged_in_id'];
$logged_in = $_SESSION['logged_in'];
if ($logged_in != TRUE) {
  header('location:orgLogin.php');
}
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
$required_languages_array = array();
$required_languages1 = $_POST['required_languages1'];
$required_languages2 = $_POST['required_languages2'];
$required_languages3 = $_POST['required_languages3'];

$required_computer_skills_array = array();
$required_computer_skills1 = $_POST['required_computer_skills1'];
$required_computer_skills2 = $_POST['required_computer_skills2'];
$required_computer_skills3 = $_POST['required_computer_skills3'];
$required_computer_skills4 = $_POST['required_computer_skills4'];
$required_computer_skills5 = $_POST['required_computer_skills5'];
$required_computer_skills6 = $_POST['required_computer_skills6'];
$required_computer_skills7 = $_POST['required_computer_skills7'];


if ($required_languages1 == TRUE) { $required_languages_array[] = $required_languages1; }
if ($required_languages2 == TRUE) { $required_languages_array[] = $required_languages2; }
if ($required_languages3 == TRUE) { $required_languages_array[] = $required_languages3; }

if ($required_computer_skills1 == TRUE) { $required_computer_skills_array[] = $required_computer_skills1; }
if ($required_computer_skills2 == TRUE) { $required_computer_skills_array[] = $required_computer_skills2; }
if ($required_computer_skills3 == TRUE) { $required_computer_skills_array[] = $required_computer_skills3; }
if ($required_computer_skills4 == TRUE) { $required_computer_skills_array[] = $required_computer_skills4; }
if ($required_computer_skills5 == TRUE) { $required_computer_skills_array[] = $required_computer_skills5; }
if ($required_computer_skills6 == TRUE) { $required_computer_skills_array[] = $required_computer_skills6; }
if ($required_computer_skills7 == TRUE) { $required_computer_skills_array[] = $required_computer_skills7; }


$required_languages = implode(", ",$required_languages_array);
$required_computer_skills = implode(", ",$required_computer_skills_array);

$organization = $_SESSION['organization'];
$job_title = $_POST['job_title'];
$job_description = $_POST['job_description'];
$location = $_POST['location'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$job_function = $_POST['job_function'];
$required_travel = $_POST['required_travel'];
$number_of_openings = $_POST['number_of_openings'];
$additional_notes = $_POST['additional_notes'];
$Organization_type = $_POST['Organization_type'];
?> <br> <?php
echo $organization; 
?> <br> <?php
echo $job_title;
?> <br> <?php
echo $job_description;
?> <br> <?php
echo $location;
?> <br> <?php
echo $start_date;
?> <br> <?php
echo $end_date;
?> <br> <?php
echo $job_function;
?> <br> <?php
echo $required_languages;
?> <br> <?php
echo $required_computer_skills;
?> <br> <?php
echo $required_travel;
?> <br> <?php
echo $number_of_openings;
?> <br> <?php
echo $additional_notes;
// This is an especially unsafe way to insert data into a database. 
$result2 = mysqli_query($connect,
"UPDATE `offers` SET `job_title` = '$job_title', `job_description` = '$job_description', `location` = '$location', `start_date` = '$start_date', `end_date` = '$end_date', `job_function` = '$job_function', `required_languages` = '$required_languages', `required_computer_skills` = '$required_computer_skills', `required_travel` = '$required_travel', `number_of_openings` = '$number_of_openings', `additional_notes` = '$additional_notes'  WHERE `id` = '$id_to_edit';");

header('location:orgStepOneDisplayOffers.php');
// $result = mysqli_query($connect,
// "INSERT INTO `offers` 
// (`id`, `organization`, `job_title`, `job_description`, `location`, `start_date`, `end_date`, `job_function`, `required_languages`, `required_computer_skills`, `required_travel`, `number_of_openings`, `additional_notes`) 
// VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);"
// );
?>