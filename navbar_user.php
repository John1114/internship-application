<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #98141e;">
  <a class="navbar-brand" href="https://ilimi.org/" target="_blank">A.D.U</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
  session_start();
  $name = $_SESSION['name'];
  $logged_in_user = $_SESSION['logged_in_user'];
  ?>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">How it Works</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">FAQ</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="userStepOne.php">Create New Acount</a>
      </li>
      <?php if ($logged_in_user == TRUE) {?>
      <li class="nav-item active">
        <a class="nav-link" href="logout_user.php">Logout from <?php echo $name ?></a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>