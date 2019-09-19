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
  <label for="name">Your Offers:</label>
        <form action="orgStepOneSubmitted.php" method="post">
          <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                <?php
                    $result2 = mysqli_query($connect,
                    "SELECT * FROM offers WHERE `organization` = '$organization';");
                  if (mysqli_num_rows($result2) == 0) {
                    echo '
                    <div class="row my-3">
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>You have no offers</strong> Please add an offer to continue.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>            
                    ';
                  } else {
                  ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Job Title</th>
                        <th scope="col">Job Description</th>
                        <th scope="col">Location</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Job Function</th>
                        <th scope="col">Required Languages</th>
                        <th scope="col">Required Computer Skills</th>
                        <th scope="col">Required Travel</th>
                        <th scope="col">Number of Openings</th>
                        <th scope="col">Additional Notes</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <?php
                      
                    while ($row = mysqli_fetch_array($result2))
                    { 
                        echo
                        '<tbody>
                        <tr>
                         <td>' . $row['job_title'] . '</td>' .
                        '<td>' . $row['job_description'] . '</td>' .
                        '<td>' . $row['location'] . '</td>' .
                        '<td>' . $row['start_date'] . '</td>' .
                        '<td>' . $row['end_date'] . '</td>' .
                        '<td>' . $row['job_function'] . '</td>' .
                        '<td>' . $row['required_languages'] . '</td>' .
                        '<td>' . $row['required_computer_skills'] . '</td>' .
                        '<td>' . $row['required_travel'] . '</td>' .
                        '<td>' . $row['number_of_openings'] . '</td>' .
                        '<td>' . $row['additional_notes'] . '</td>' .
                        '<td>   <a href="orgStepOneOfferEdit.php?id='.$row['id'].'">Edit</a>
                          </td>' .
                        '<td> <a href="orgStepOneOfferRemove.php?id='.$row['id'].'">Remove</a>
                    </td>' .
                        '</tr>' .
                        '</tbody>';
                    }
                  }
                ?>
                    </table>
                    </div>
                
              </div>
            </div>
                    
          </div>
          <br>
          <input type="button" class="btn btn-primary" value="Add Offer" onclick="window.location.href='orgStepOneOffers.php'" />
          <hr>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" required>
            <label class="form-check-label">I accept the <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"  target="_blank">Terms & Conditions.</a></label>
          </div>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Submit Offers </button>
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
        Once you press Submit then you won't be able to change any of your offers, are you sure you want to continue?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
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
