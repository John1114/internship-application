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

    ?>
    <div class="card-deck">
    <div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <div class="card-body">
    <form action="userStepOneProcess.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="eg. Michael" required>
      </div>
      <hr>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="eg. Scott" required>
      </div>
      <hr>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="eg. mscott@dmifflin.com" required>
      </div>
      <hr>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="eg. ********" required>
      </div>
      <hr>
      <div class="form-group">
        <label for="whatsapp_number">Whatsapp Number</label>
        <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" placeholder="eg. +227 73295683" required>
      </div>
      <hr>
      <div class="form-group">
        <label for="graduation_year">Graduation year</label>
                    <select name="graduation_year">
                    <option name="graduation_year" value="2020">2020</option>
                    <option name="graduation_year" value="2021">2021</option>
                    <option name="graduation_year" value="2022">2022</option>
                    </select>
      </div>
      <hr>
      <div class="form-group">
        <label for="major">Major</label>
                    <select name="major">
                    <option name="major" value="Banque Finance">Banque Finance</option>
                    <option name="major" value="Communication d'Entreprise">Communication d'Entreprise</option>
                    <option name="major" value="Droit">Droit</option>
                    <option name="major" value="Entreprenariat">Entreprenariat </option>
                    <option name="major" value="Expertise Comptable ">Expertise Comptable </option>
                    <option name="major" value="Finance Islamique ">Finance Islamique </option>
                    <option name="major" value="Informatique de Gestion">Informatique de Gestion</option>
                    <option name="major" value="Logistique">Logistique</option>
                    <option name="major" value="Management">Management</option>
                    <option name="major" value="Marketing">Marketing</option>
                    <option name="major" value="Resources Humaines">Resources Humaines</option>
                    <option name="major" value="Gestion de Projets">Gestion de Projets</option>
                    </select>
      </div>
      <hr>
      <div class="form-group">
        <label for="home_adress">Home Adress</label>
        <input type="text" class="form-control" id="home_adress" name="home_adress" placeholder="eg. Village Francophonie, Niamey" required>
      </div>
      <hr>
      <hr>
      <div class="form-group">
        <label for="language1" for="language2" for="language3">Languages:</label>
        <br>
        <input type="checkbox" name="language1" value="English"> English<br>
        <input type="checkbox" name="language2" value="French"> French<br>
        <input type="checkbox" name="language3" value="Hausa"> Hausa<br>
      </div>
      <div class="form-group">
      <h5>Upload your CV as a PDF</h5>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <!-- MAX_FILE_SIZE must precede the file input field -->
                                        <input type="file" name="fileToUpload" class="custom-file-input" id="customFile" accept="application/pdf" required/>
                                        <label class="custom-file-label" for="customFile" onchange="setfilename(this.value);" value="Select File"></label>
                                    </div>
                                </div> 
      </div>
      <hr>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" required>
        <label class="form-check-label">I accept the <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"  target="_blank">Terms & Conditions.</a></label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
<div class="card  mt-3 mb-5 mr-5 ml-5" style="width: 40rem;">
  <img class="card-img-top" src="https://drive.google.com/uc?id=1ZsjuHBMXhetQRhBO5mj5L3yVKu9iyzX7" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Sign up to find your best possible internship oppurtinity!</h5>
    <p class="card-text">Using a Nobel Prize winning Algorithm, our program is able to come up with the best possible internships oppurtinities for you, and the best possible interns for recruiters. Our goal is to make sure that you end up with internships which gives you plenty of experience and open new doors in life.</p>
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
    <script>
  function setfilename(val)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
    document.getElementById("uploadFile").value = fileName;
  }
</script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
