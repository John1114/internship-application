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

    if($row['stage'] == "signup") {
        header('location:orgStepOneDisplayOffers.php');
    }
    if($row['stage'] == "postinterview") {
        header('location:orgStepThree.php');
    }
  }
$function = $_GET['function'];
?>
  <div class="card-deck">
  <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <div class="card-body">
  <?php
        $user_already_added = $_SESSION['user_already_added'];
        if ($user_already_added == TRUE) {
        echo '
            <div class="row my-3">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops</strong> You already added this person to your interview list.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>            
            ';
    }
    unset($_SESSION['user_already_added']);

    $user_added = $_SESSION["user_added"];
    if ($user_added == true) {
    echo '
        <div class="row my-3">
            <div class="col-12">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Added to interview list</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>            
        ';
}
unset($_SESSION['user_added']);

$user_removed = $_SESSION["user_removed"];
if ($user_removed == true) {
echo '
    <div class="row my-3">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Removed from interview list</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>            
    ';
}
unset($_SESSION['user_removed']);

$no_interviews = $_SESSION['no_interviews'];
if ($no_interviews == true) {
echo '
    <div class="row my-3">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please have at least one person in your interview list</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>            
    ';
}
unset($_SESSION['no_interviews']);
    ?>
    <div class="accordion" id="accordionExample">
    <?php
                    $result2 = mysqli_query($connect,
                        "SELECT * FROM offers WHERE `organization` = '$organization';");
                    while ($row = mysqli_fetch_array($result2))
                    { ?>
      <div class="card">
        <div class="card-header" id="heading<?php echo $row['id'] ?>">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['id'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $row['id'] ?>">
              <?php echo $row['job_title'] ?>
            </button>
          </h5>
        </div>
        <div id="collapse<?php echo $row['id'] ?>" class="collapse" aria-labelledby="heading<?php echo $row['id'] ?>" data-parent="#accordionExample">
          <div class="card-body">

    <?php
    $job_title = $row['job_title'];
    $offer_id =  $row['id'];
                    $result3 = mysqli_query($connect,
                        "SELECT * FROM `opportunities` WHERE `organization` = '$organization' AND `job_title` = '$job_title';");
                    while ($row = mysqli_fetch_array($result3))
                    { 
                        $brief_description = $row['user_name'] . " has a major in " . $row['user_major'] . ", and speaks " . $row['user_languages'];
                        ?>

          <form>
<input type="button" class="btn btn-primary" value="<?php echo $brief_description ?>" onclick="window.location.href='orgStepTwo.php?function=viewuser&id=<?php echo $row['user_id'] ?>&offer_name=<?php echo $job_title ?>&offer_id=<?php echo $offer_id ?>'" />
</form> <br>

    <?php } ?>

          </div>
        </div>
      </div>
                    <?php } ?>
    </div>
  </div>
  </div>
  <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <div class="card-body">

  <?php 
  if ($function == "viewuser") {
    session_start();
    include 'database_inc.php'; 
    $user_id = $_GET['id'];
    $offer_id = $_GET['offer_id'];
    $offer_name = $_GET['offer_name'];

    $result4 = mysqli_query($connect,
        "SELECT * FROM users WHERE `id` = '$user_id';");
    while ($row = mysqli_fetch_array($result4))
    { 
     $full_name = $row['first_name'] . " " . $row['last_name']   ?>
<ul class="list-group">
  <li class="list-group-item"><b>Name: </b><?php echo $full_name ?></li>
  <li class="list-group-item"><b>Email: </b><?php echo $row['email'] ?></li>
  <li class="list-group-item"><b>Whatsapp Number: </b><?php echo $row['whatsapp_number'] ?></li>
  <li class="list-group-item"><b>Graduation Year: </b><?php echo $row['graduation_year'] ?></li>
  <li class="list-group-item"><b>Major: </b><?php echo $row['major'] ?></li>
  <li class="list-group-item"><b>Home Adress: </b><?php echo $row['home_adress'] ?></li>
  <li class="list-group-item"><b>Languages Spoken: <?php echo $row['languages'] ?></li>
    <li class="list-group-item"><a href="https://ilimi.org/internships/uploads/<?php echo $row['cv'] ?>" download>Download CV</a>
    <br>
    <a href="https://ilimi.org/internships/uploads/<?php echo $row['cv'] ?>" target="_blank">View CV</a>
    </li>
</ul>
<br>
<form>
<input type="button" class="btn btn-primary" value="Add to Interview List" onclick="window.location.href='orgStepTwoProcess.php?id=<?php echo $row['id'] ?>&user_name=<?php echo $full_name ?>&offer_id=<?php echo $offer_id ?>&offer_name=<?php echo $offer_name ?>'"/>  
<br>    
<br>
<input type="button" class="btn btn-primary" value="View Interview List" onclick="window.location.href='orgStepTwo.php?function=viewlist'" />
</form>
    <?php }
  }
  


  elseif ($function == "viewlist") {
    $result4 = mysqli_query($connect,
    "SELECT * FROM offers WHERE `organization` = '$organization';");
while ($row = mysqli_fetch_array($result4))
{ $job_title = $row["job_title"]?>
<ul class="list-group">
  <li class="list-group-item"><b><?php echo $row["job_title"] ?>:</b> <br>

<?php
                    $result5 = mysqli_query($connect,
                    "SELECT * FROM `interviews` WHERE `organization_id` = '$organization_id' AND `offer_name` = '$job_title';");
                    if (mysqli_num_rows($result5) == FALSE) {
                      echo "You have no people to interview for the " . $job_title . " position.";
                      }
                    while ($row = mysqli_fetch_array($result5))
                { ?>
      <form>
<div class="btn-group" role="group" aria-label="Basic example">
<input type="button" class="btn btn-primary btn-sm" value="<?php echo $row["user_name"] ?>" onclick="window.location.href='orgStepTwo.php?function=viewuser&id=<?php echo $row['user_id'] ?>&offer_name=<?php echo $row['job_title'] ?>&offer_id=<?php echo $row['offer_id'] ?>'" />
<input type="button" class="btn btn-secondary btn-sm" value="Remove from list" onclick="window.location.href='orgStepTwoRemove.php?user_id=<?php echo $row['user_id'] ?>&offer_id=<?php echo $row['offer_id'] ?>'" />
</div>
</form> 
<br>
<?php } ?>
</li>
</ul>
<br>
<?php } ?>
<br>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Submit Interview List </button>
          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Interview List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Once you press Submit then you won't be able to change who you are going to have an interview with, are you sure you want to continue?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="window.location.href='orgStepTwoSubmitted.php'">Submit</button>
      </div>
    </div>
  </div>
</div>

  <?php } ?>

    

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
