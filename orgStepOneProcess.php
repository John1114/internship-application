<?php
session_start();
include('database_inc.php');
$organization_name = $_POST['organization_name'];
$_SESSION['organization'] = $organization_name;
$primary_contact = $_POST['primary_contact'];
$email_of_primary_contact = $_POST['email_of_primary_contact'];
$phone_of_primary_contact = $_POST['phone_of_primary_contact'];
$office_adress = $_POST['office_adress'];
$password = $_POST['password'];
$Organization_type = $_POST['Organization_type'];
$stage = "signup";
$_SESSION['logged_in'] = TRUE;
// This is an especially unsafe way to insert data into a database. 
$result = mysqli_query($connect,
    "INSERT INTO `organizations` 
    (`id`, `organization_name`,`password`, `primary_contact`, `email_of_primary_contact`, `phone_of_primary_contact`, `office_adress`, `Organization_type`, `stage`) 
    VALUES (NULL, '$organization_name', '$password', '$primary_contact', '$email_of_primary_contact', '$phone_of_primary_contact', '$office_adress', '$Organization_type', '$stage');");
header('location:orgStepOneOffers.php');
// $result = mysqli_query($connect,
// "INSERT INTO `offer` 
// (`id`, `organization`, `job_title`, `job_description`, `location`, `start_date`, `end_date`, `job_function`, `required_languages`, `required_computer_skills`, `required_travel`, `number_of_openings`, `additional_notes`) 
// VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);"
// );
?> 