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
if($row['stage'] == "postinterview") {
    header('location:userStepThree.php');
}
if($row['stage'] == "standby") {
    header('location:waiting.php');
}
}
 
$offer_id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_major = $_SESSION['user_major'];
$user_languages = $_SESSION['user_languages'];
$organization = $_GET['org'];
$job_title = $_GET['title'];
// This is an especially unsafe way to insert data into a database.

$result2 = mysqli_query($connect,
"SELECT * FROM opportunities WHERE `user_id` = '$user_id';");
while ($row = mysqli_fetch_array($result2)) {
    if ($row['offer_id'] == $offer_id) {
        $_SESSION['offer_already_added'] = TRUE;
        $offer_already_added = TRUE;
        header('location:userStepTwo.php');
    }
}
if ($offer_already_added != TRUE) {
$result2 = mysqli_query($connect,
    "INSERT INTO `opportunities` 
    (`id`, `offer_id`, `user_id`, `user_name`, `user_major`, `user_languages`, `organization`, `job_title`) 
    VALUES (NULL, '$offer_id', '$user_id', '$user_name', '$user_major', '$user_languages', '$organization', '$job_title');"
);
}
$offer_added = true;
$_SESSION['offer_added'] = $offer_added;
header('location:userStepTwo.php');
 include('user_footer.php');

header('location:userStepTwo.php'); 
// $result = mysqli_query($connect,
// "INSERT INTO `offer` 
// (`id`, `organization`, `job_title`, `job_description`, `location`, `start_date`, `end_date`, `job_function`, `required_languages`, `required_computer_skills`, `required_travel`, `number_of_openings`, `additional_notes`) 
// VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);"
// );
?>