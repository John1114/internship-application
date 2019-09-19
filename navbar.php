<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #98141e;">
  <a class="navbar-brand" href="https://ilimi.org/" target="_blank">A.D.U</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
  session_start();
  $organization = $_SESSION['organization'];
  $logged_in = $_SESSION['logged_in'];
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
        <a class="nav-link" href="#">What Do I Do?</a>
      </li>
      <?php if ($logged_in == TRUE) {?>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout from <?php echo $organization ?></a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>
