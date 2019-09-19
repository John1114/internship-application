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
$message_empty_list = $_SESSION['message_empty_list'];
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
$user_id = $_SESSION['user_id']
?>
    <div class="card-deck">
    <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <div class="card-body">
  <?php
        if ($message_empty_list == true) {
        echo '
            <div class="row my-3">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops</strong> Please choose which offers you are interested in.
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
    <ul class="list-group">

    <?php
                    $result2 = mysqli_query($connect,
                        "SELECT * FROM opportunities WHERE `user_id` = '$user_id';");
                    while ($row = mysqli_fetch_array($result2))
                    { ?>

      <li class="list-group-item"><?php echo $row['organization']?> - <?php echo $row['job_title']?> <div class="float-right">
        <form> <input type="button" class="btn btn-secondary btn-sm" value="Remove" onclick="window.location.href='userFirstListRemove.php?id=<?php echo $row['id']?>'" />
        </form></div></li> 
        <?php } ?>
    </ul>
    <br>
    <form>
    <input type="button" class="btn btn-primary" value="Add More" onclick="window.location.href='userStepTwo.php'" />
    <div class="float-right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Submit List </button>
</div>
          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Offers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Once you press Submit then you won't be able to change any of the offers you are interested in, are you sure you want to continue?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" class="btn btn-primary" value="Submit" onclick="window.location.href='userFirstListSubmitted.php'" />
      </div>
    </div>
  </div>
</div>
    </form>

  </div>
</div>
<div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <img class="card-img-top" src="https://drive.google.com/uc?id=16we0nHapzlH0fQUf7CKw2MsIS7_yWkVN" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Sign up to find your best possible internship oppurtinity!</h5>
    <p class="card-text">Make some final adjustments to your list, so that you get the best possible interviews!</p>
  </div>
</div>
</div>
<footer>
 <?php
 include('user_footer.php');
 ?>
</footer>
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
