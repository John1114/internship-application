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
include 'navbar.php';
?>
    <div class="card-deck">
    <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <div class="card-body">


        <form action="orgStepOneProcess.php" method="post">
          <div class="form-group">
            <label for="organization_name">Organization Name:</label>
            <input type="text" class="form-control" id="organization_name" name="organization_name" placeholder="eg. Orange" required>
          </div>
          <hr>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
          </div>
          <hr>
          <div class="form-group">
            <label for="primary_contact">Primary Contact Person:</label>
            <input type="text" class="form-control" id="primary_contact" name="primary_contact" placeholder="eg. Stéphane Richard " required>
          </div>
          <hr>
          <div class="form-group">
            <label for="email_of_primary_contact">Email Adress of Primary Contact:</label>
            <input type="email" class="form-control" id="email_of_primary_contact" name="email_of_primary_contact" placeholder="eg. srichard@orange.com" required>
          </div>
          <hr>
          <div class="form-group">
            <label for="phone_of_primary_contact">Phone number of Primary Contact:</label>
            <input type="TEXT" class="form-control" id="phone_of_primary_contact" name="phone_of_primary_contact" placeholder="eg. +227 73295683 " required>
          </div>
          <hr>
          <div class="form-group">
            <label for="office_adress">Adress of your Office:</label>
            <input type="TEXT" class="form-control" id="office_adress" name="office_adress" placeholder="eg. Village Francophonie" required>
          </div>
          <hr>
          <div class="form-group">
            <label for="Organization_type">Type of Organization:</label>
            <br>
            <input type="radio" name="Organization_type" value="Government"> Government<br>
            <input type="radio" name="Organization_type" value="Internation NGO"> Internation NGO<br>
            <input type="radio" name="Organization_type" value="Local NGO"> Local NGO<br>
            <input type="radio" name="Organization_type" value="Corporation" checked> Corporation<br>
          </div>
          <hr>

         
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" required>
            <label class="form-check-label">I accept the <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"  target="_blank">Terms & Conditions.</a></label>
          </div>
          <button type="submit" class="btn btn-primary">Submit Info</button>
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
