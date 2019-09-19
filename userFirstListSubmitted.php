<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>userStepOne</title>

  </head>
  <body>

    <?php include 'navbar_user.php';
session_start();
include('database_inc.php');
$email = $_SESSION['email'];
$user_id = $_SESSION['user_id'];
$logged_in_user = $_SESSION['logged_in_user'];
if ($logged_in_user != TRUE) {
  header('location:userLogin.php');
}
 
$result = mysqli_query($connect,
    "SELECT * FROM opportunities WHERE user_id = '$user_id';");
if (mysqli_num_rows($result) == 0) {
    $_SESSION['message_empty_list'] = TRUE;
    header('location:userFirstList.php'); 
}

$result2 = mysqli_query($connect,
"UPDATE `users` SET `stage` = 'postinterview'  WHERE `email` = '$email';");
?>


<div class="card text-dark  mx-auto mt-3" style="width: 55rem;">
  <div class="card-body">
    <h1 class="card-title">Thank you for submiting your offers!</h2>
    <p class="card-text">An email will be sent to you with everybody who is potentially interested with your offers, and who is willing to have an interview with you.</p>
  </div>
<img class="card-img" src="https://drive.google.com/uc?id=19yL0UiYWpkivXyC5qwBQmzee8K4rGZg7" alt="Card image">
</div>
    <!-- Optional JavaScript -->
    <script>
    function openInNewTab(url) {
      var win = window.open(url, '_blank');
      win.focus();
    }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
