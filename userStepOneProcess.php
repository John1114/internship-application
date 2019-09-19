<?php
session_start();
include('database_inc.php');




$languages_array = array();
$language1 = $_POST['language1'];
$language2 = $_POST['language2'];
$language3 = $_POST['language3'];

if ($language1 == TRUE) { $languages_array[] = $language1; }
if ($language2 == TRUE) { $languages_array[] = $language2; }
if ($language3 == TRUE) { $languages_array[] = $language3; }

$languages = implode(", ",$languages_array);
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$whatsapp_number = $_POST['whatsapp_number'];
$graduation_year = $_POST['graduation_year'];
$major = $_POST['major'];
$home_adress = $_POST['home_adress'];
// This is an especially unsafe way to insert data into a database. 

$uploaddir  = "/home/virtuals/ilimi.org/internships/uploads/";
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
// ADD CHECK FOR ONLY PDF!! 

$new_name="CV"."$name"."$graduation_year".round(microtime(true)).".pdf";
move_uploaded_file($tmp_name, "$uploaddir"."$new_name");

$result = mysqli_query($connect,
    "INSERT INTO `users` 
    (`id`, `email`, `password`, `first_name`, `last_name`, `whatsapp_number`, `graduation_year`, `major`, `home_adress`, `languages`, `cv`, `stage`) 
    VALUES (NULL, '$email', '$password', '$name', '$lastname', '$whatsapp_number', '$graduation_year', '$major', '$home_adress', '$languages', '$new_name', 'preinterview');"
);

$result2 = mysqli_query($connect,
"SELECT * FROM users WHERE `email` = '$email';");
while ($row = mysqli_fetch_array($result2)) {
    $user_id = $row['id'];
}
echo $user_id;
$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $name . " " . $lastname;
$_SESSION['user_languages'] = $languages;
$_SESSION['user_major'] = $major;
$_SESSION['logged_in_user'] = TRUE;
$_SESSION['name'] = $name;
header('location:userStepTwo.php');
include('user_footer.php');
?> 