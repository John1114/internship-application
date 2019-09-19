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
session_start();
include 'database_inc.php'; 
$organization = $_SESSION['organization'];
$organization_id = $_SESSION['logged_in_id'];
$logged_in = $_SESSION['logged_in'];
if ($logged_in != TRUE) {
  header('location:orgLogin.php');
}
$result = mysqli_query($connect,
    "SELECT * FROM organizations WHERE organization_name = '$organization';");
    while ($row = mysqli_fetch_array($result)) {

    // if($row['stage'] == "signup") {
    //     header('location:orgStepOneDisplayOffers.php');
    // }
    // if($row['stage'] == "preinterview") {
    //     header('location:orgStepTwo.php');
    // }
    // if($row['stage'] == "standby") {
    //     header('location:waiting.php');
    // }
  }
$function = $_GET['function'];
?>
    <div class="card-deck">
    <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <div class="card-body">
  <?php
        $no_option_chosen = $_SESSION['no_option_chosen'];
        $preference_number = $_SESSION['preference_number'];
        $offer_name = $_SESSION['offer_name'];
        if ($no_option_chosen == TRUE) {
        echo '
            <div class="row my-3">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops</strong> Please select an option for preference '.$preference_number.' in the '.$offer_name.' internship.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
    }
    unset($_SESSION['no_option_chosen']);
    $duplicate_name_chosen = $_SESSION['duplicate_name_chosen'];
    $job_title = $_SESSION['job_title'];
    if ($duplicate_name_chosen == TRUE) {
    echo '
        <div class="row my-3">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Oops</strong> Please avoid selecting one person more than once in the '.$job_title.' internship.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>            
        ';
}
unset($_SESSION['duplicate_name_chosen']);
    ?>
<form action="orgStepThreeProcess.php" method="post">
    <ul class="list-group">
    <?php
    $result = mysqli_query($connect,
        "SELECT * FROM offers WHERE `organization` = '$organization';");
    while ($row = mysqli_fetch_array($result))
    { $preference_number = 1?>
      <li class="list-group-item"> 
      <h6> Preferences for the <b><?php echo $row['job_title'] ?></b> internship:</h6>
      <?php
    $job_title = $row['job_title'];
    $result2 = mysqli_query($connect,
        "SELECT * FROM interviews WHERE `organization_name` = '$organization' AND `offer_name` = '$job_title';");
    while ($row = mysqli_fetch_array($result2))
    { ?>  
  <select class="custom-select" name="<?php echo $row['offer_id'] . "_" . $preference_number ?>">
  <option selected disabled value="incorrect">Preference <?php echo $preference_number ?></option>
  <?php
  $preference_number += 1;
  $result3 = mysqli_query($connect,
        "SELECT * FROM interviews WHERE `organization_name` = '$organization' AND `offer_name` = '$job_title';");
    while ($row = mysqli_fetch_array($result3))
    { ?> 
  <option value="<?php echo $row['user_id']?>"><?php echo $row['user_name']?></option>
  <?php } ?>
  <option value="NULL">No preference</option>
  </select> <br> <br>
  
  <?php } ?>
  </li>
    <?php } ?>
    </ul>
    <br>
<button type="submit" class="btn btn-primary">Submit Final List</button>
</form>

    </form>

  </div>
</div>
<div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <img class="card-img-top" src="https://drive.google.com/uc?id=1imgJfYC1HIw3Qs3CKAKhS13YAkY6CgzV" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Submit your final ranked list of you prefered internships!</h5>
    <p class="card-text">Just rank your internships in your preffered order, and let the algorithm do its job! Make sure to each rank has only on internship, otherwise it won't work.</p>
  </div>
</div>
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
