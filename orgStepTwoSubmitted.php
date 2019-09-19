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

    <?php 
    include 'navbar.php';
    include('database_inc.php');
session_start();
$logged_in = $_SESSION['logged_in'];
if ($logged_in != TRUE) {
  header('location:orgLogin.php');
}
$organization = $_SESSION['organization'];
$result = mysqli_query($connect,
    "SELECT * FROM organizations WHERE organization_name = '$organization';");
    while ($row = mysqli_fetch_array($result)) {

    if($row['stage'] == "sign") {
        header('location:orgStepOneDisplayOffers.php');
    }
    if($row['stage'] == "postinterview") {
        header('location:orgStepThree.php');
    }
    if($row['stage'] == "standby") {
      header('location:waiting.php');
  }
  }
$organization = $_SESSION['organization'];
$organization_id = $_SESSION['logged_in_id'];
$logged_in = $_SESSION['logged_in'];
if ($logged_in != TRUE) {
  header('location:orgLogin.php');
}

$result2 = mysqli_query($connect,
    "SELECT * FROM interviews WHERE organization_id = '$organization_id';");
if (mysqli_num_rows($result2) == 0) {
    $_SESSION['no_interviews'] = TRUE;
    header('location:orgStepTwo.php?function=viewlist');
}

$stage = "postinterview";
if ($_SESSION['no_interviews'] != TRUE) {
$result3 = mysqli_query($connect,
"UPDATE `organizations` SET `stage` = '$stage'  WHERE `id` = '$organization_id';");
    
}?>


<div class="card text-dark  mx-auto mt-3" style="width: 55rem;">
  <div class="card-body">
  <?php
        if ($message_empty_list == true) {
        echo '
            <div class="row my-3">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops</strong> Please create at least one internship offer.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
    }
    unset($_SESSION['message_empty_list']);
    ?>
    <h1 class="card-title">Thank you for submiting your interview list!</h2>
    <p class="card-text">An email will be sent to you with everybody who you would like to have an interview with, and to yourself, so that you could could set up an interview.</p>
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
