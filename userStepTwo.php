<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>userStepTwo</title>
  </head>
  <body>
  <?php 
$user_id = $_SESSION['user_id'];
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
if($row['stage'] == "postinterview") {
    header('location:userStepThree.php');
}
if($row['stage'] == "standby") {
    header('location:waiting.php');
}
}
?>
  <div class="card-deck">
  <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <div class="card-body">
  <?php
        $offer_already_added = $_SESSION['offer_already_added'];
        if ($offer_already_added == true) {
        echo '
            <div class="row my-3">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops</strong> You already added this offer to your list.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
    }; 
    unset($_SESSION['offer_already_added']);
    ?>
      <?php
        $offer_added = $_SESSION['offer_added'];
        if ($offer_added == true) {
        echo '
            <div class="row my-3">
                <div class="col-12">
                    <div class="alert alert-primary alert-dismissible fade show" role="primary">
                        Offer was added to your list.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
    }; 
    unset($_SESSION['offer_already_added']);
    ?>
    <div class="accordion" id="accordionExample">
    <?php
                    $result2 = mysqli_query($connect,
                        "SELECT * FROM offers ORDER BY organization ASC;");
                    while ($row = mysqli_fetch_array($result2))
                    { ?>
      <div class="card">
        <div class="card-header" id="heading<?php echo $row['id'] ?>">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['id'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $row['id'] ?>">
              <?php echo $row['organization'] ?> - <?php echo $row['job_title'] ?>
            </button>
          </h5>
        </div>
        <div id="collapse<?php echo $row['id'] ?>" class="collapse" aria-labelledby="heading<?php echo $row['id'] ?>" data-parent="#accordionExample">
          <div class="card-body">
            <b>Description - </b><?php echo $row['job_description'] ?> <br>
            <b>Location - </b><?php echo $row['location'] ?> <br>
            <b>Dates - </b><?php echo $row['start_date'] ?>  - <?php echo $row['end_date'] ?> <br>
            <b>Job Function - </b><?php echo $row['job_function'] ?> <br>
            <b>Required Languages - </b><?php echo $row['required_languages'] ?> <br>
            <b>Required Computer Skills - </b><?php echo $row['required_computer_skills'] ?> <br>
            <b>Required Travel - </b><?php echo $row['required_travel'] ?> <br>
            <b>Number of Openings - </b><?php echo $row['number_of_openings'] ?> <br>
            <b>Additional Notes - </b><?php echo $row['additional_notes'] ?> <br>

          <form>
<input type="button" class="btn btn-primary" value="Add to List" onclick="window.location.href='userStepTwoProcess.php?id=<?php echo $row['id'] ?>&org=<?php echo $row['organization'] ?>&title=<?php echo $row['job_title'] ?>'" />
</form>
          </div>
        </div>
      </div> 
                    <?php } ?>
    </div>
  </div>
  </div>
  <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <img class="card-img-top" src="https://drive.google.com/uc?id=1cXPliy_JRwy5LdKhCqnbICNcpupzFoAW" alt="Card image cap">
  <div class="card-body">
  <h5 class="card-title">Pick your options!</h5>
  <p class="card-text">Look at who is offering internships and all the information about it. If you just click on the internship you will see the start/end date, requirements, job openings, a general description, and you will be able to add it to your list. Find out which job is most suitable for you, and add it to your list, so that they can consider you for an interview. </p>
  <form>
  <input type="button" class="btn btn-primary" value="View List/Submit List" onclick="window.location.href='userFirstList.php'" />
  </form>
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
