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
include 'navbar_user.php';
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
// if($row['stage'] == "preinterview") {
//     header('location:userStepTwo.php');
// }
// if($row['stage'] == "standby") {
//     header('location:waiting.php');
// }
}
?>
    <div class="card-deck">
    <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <div class="card-body">
  <?php
    $no_option_chosen = $_SESSION['no_option_chosen'];
    $preference_number = $_SESSION['preference_number'];
    if ($no_option_chosen == TRUE) {
    echo '
        <div class="row my-3">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Oops</strong> Please select an option for preference '.$preference_number.'.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>            
        ';
}
unset($_SESSION['no_option_chosen']);
$duplicate_offer_chosen = $_SESSION['duplicate_offer_chosen'];
if ($duplicate_offer_chosen == TRUE) {
echo '
    <div class="row my-3">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops</strong> Please avoid selecting an option more than once.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>            
    ';
}
unset($_SESSION['duplicate_offer_chosen']);
    ?>
<form action="userStepThreeProcess.php" method="post">
    <ul class="list-group">
      <li class="list-group-item"> 
      <h6> Your prefered internships:</h6>
<?php
$preference_number = 1;
  $result2 = mysqli_query($connect,
  "SELECT * FROM interviews WHERE `user_id` = '$user_id';");
while ($row = mysqli_fetch_array($result2))
{
?>
  <select class="custom-select" name="<?php echo $preference_number ?>">
  <option selected disabled value="incorrect">Preference <?php echo $preference_number ?></option>
<?php
  $result3 = mysqli_query($connect,
  "SELECT * FROM interviews WHERE `user_id` = '$user_id';");
while ($row = mysqli_fetch_array($result3))
{
?>
  <option value="<?php echo $row['offer_id']?>"><?php echo $row['offer_name']?></option>
  <?php } ?>
  <option value="NULL">No preference</option>
  </select>
  <br> <br>
<?php $preference_number +=1;} ?>
  </li>
    
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
    <h5 class="card-title">Submit your final ranked list of you prefered interns!</h5>
    <p class="card-text">Just rank your interns in your preffered order, and let the algorithm do its job! Make sure to each intern is only selectd once for each internship.</p>
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
