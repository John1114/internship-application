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

    <?php include 'navbar.php' ?>
    <div class="card-deck">
    <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <div class="card-body">
      <?php
        session_start();
        include 'database_inc.php'; 
        $user_id = $_GET['id'];

        $result = mysqli_query($connect,
            "SELECT * FROM users WHERE `id` = '$user_id';");
        while ($row = mysqli_fetch_array($result))
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
      <li class="list-group-item"><a href="http://www.nwu.ac.za/files/images/Basic_Curriculum_Vitae_example.pdf" download>Download CV</a><br><a href="http://www.nwu.ac.za/files/images/Basic_Curriculum_Vitae_example.pdf" target="_blank">View CV</a></li>
    </ul>
        <?php } ?>
    <br>
    <form>
    <input type="button" class="btn btn-primary" value="Add to interview list" onclick="window.location.href='orgStepTwoProcess.php'" />
    <div class="float-right">
<input type="button" class="btn btn-primary" value="Go Back" onclick="window.location.href='orgStepTwo.php'" />
</div>
    </form>
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
