<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>userStepOne</title>

  </head>
  <body>
<?php 
session_start();
include 'navbar_user.php';
$message_login_problem = $_SESSION['message_login_problem'];
$logged_in_user = $_SESSION['logged_in_user'];
if($logged_in_user == TRUE) {
    $logged_in_user = FALSE;
    $_SESSION['logged_in_user'] = $logged_in_user;
    header('location:logout_user.php');
}
?>
    <div class="card-deck">
    <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
    <?php
        if ($message_login_problem == TRUE) {
        echo '
            <div class="row my-3">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops</strong> There was a problem logging in. Please try again.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
    }
    unset($_SESSION['message_login_problem']);
    ?>
  <div class="card-body">


        <form action="userLoginProcess.php" method="post">
          <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="eg. Micheal Scott" required>
          </div>
          <hr>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
  </div>
</div>
</div>
<?php
 include('user_footer.php');
 ?>
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
