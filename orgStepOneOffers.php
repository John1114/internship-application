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
include 'database_inc.php';
$organization = $_SESSION['organization'];
$organization_id = $_SESSION['logged_in_id'];
$logged_in = $_SESSION['logged_in'];
if ($logged_in != TRUE) {
  header('location:orgLogin.php');
}
$result = mysqli_query($connect,
    "SELECT * FROM organizations WHERE id = '$organization_id';");
    while ($row = mysqli_fetch_array($result)) {

    if($row['stage'] == "preinterview") {
        header('location:orgStepTwo.php');
    }
    if($row['stage'] == "postinterview") {
        header('location:orgStepThree.php');
    }
  }
?>
    <div class="card-deck">
    <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <div class="card-body">
          
          <form action="orgStepOneOffersProcess.php" method="post">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5>
                    Add your Offer 
                </h5>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="job_title">Job title:</label>
                    <input type="text" class="form-control" id="job_title" name="job_title" placeholder="eg. Assistant to the Regional Manager" required>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="job_description">Job Description:</label>
                    <input type="text" class="form-control" id="job_description" name="job_description" placeholder="eg. You will be help the Regional Manager with day to day assignemnts... " required>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="location">Location (Country and City):</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="eg. Niger, Niamey " required>
                  </div>
                  <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <select name="start_date">
                    <option name="start_date" value="July 1" selected >July 1</option>
                    <option name="start_date" value="Oct 1">October 1</option>
                    </select>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <select name="end_date">
                    <option name="end_date" id="end_date" value="Sept 30" selected>September 30</option>
                    <option name="end_date" id="end_date" value="Dec 30">December 30</option>
                    </select>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="job_function">Primary function of Job:</label>
                    <select name="job_function">
                    <option name="job_function" value="Communication" selected>Communication</option>
                    <option name="job_function" value="HR">Human Recourses</option>
                    <option name="job_function" value="Marketing">Marketing</option>
                    <option name="job_function" value="Operations">Operations</option>
                    <option name="job_function" value="Project Management">Project Management</option>
                    <option name="job_function" value="IT">IT</option>
                    <option name="job_function" value="Other">Other</option>
                    </select>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="required_languages1" for="required_languages2" for="required_languages3">Required Language skills:</label>
                    <br>
                    <input type="checkbox" name="required_languages1" value="English" checked> English<br>
                    <input type="checkbox" name="required_languages2" value="French"> French<br>
                    <input type="checkbox" name="required_languages3" value="Hausa"> Hausa<br>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label>Required Computer skills:</label>
                    <br>
                    <input type="checkbox" name="required_computer_skills1" value="Excel" checked> Excel<br>
                    <input type="checkbox" name="required_computer_skills2" value="Word"> Word<br>
                    <input type="checkbox" name="required_computer_skills3" value="PowerPoint"> PowerPoint<br>
                    <input type="checkbox" name="required_computer_skills4" value="InDesign"> InDesign<br>
                    <input type="checkbox" name="required_computer_skills5" value="PhotoShop"> PhotoShop<br>
                    <input type="checkbox" name="required_computer_skills6" value="Coding"> Coding<br>
                    <input type="checkbox" name="required_computer_skills7" value="Other"> Other<br>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="required_travel">Required Travel:</label>
                    <br>
                    <input type="radio" name="required_travel" value="Yes" checked> Yes<br>
                    <input type="radio" name="required_travel" value="No"> No<br>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="number_of_openings">Number of Openings:</label>
                    <input type="number" class="form-control" id="number_of_openings" name="number_of_openings" placeholder="3" min="1" required>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="additional_notes">Aditional Notes:</label>
                    <input type="text" class="form-control" id="additional_notes" name="additional_notes" placeholder="eg. We will most likely require you to work during the weekends">
                  </div>
              </div>
            
            
          <br>
          <button type="submit" class="btn btn-primary">Submit Info</button>
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